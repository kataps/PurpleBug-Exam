<?php 
include_once '../config/database.php';
require_once "mail.php";

class Products extends Database {

	protected $db;

	public function __construct(){
		date_default_timezone_set('Asia/Manila');
		$this->db = new Database();
	}

	public function read_products($categ){

		/*indentify the category*/
		switch ($categ) {
			case 'bread':
				$stmt = "select * from bread_tbl";
				break;
			case 'souce':
				$stmt = "select * from souce_tbl";
				break;
			case 'swtype':
				$stmt = "select * from swtype_tbl";
				break;
			case 'cheese':
				$stmt = "select * from cheese_tbl";
				break;
			case 'veggies':
				$stmt = "select * from veggies_tbl";
				break;

			default:
				return false;
				
		}
		echo	$result = $this->db->read($stmt);
		

	}
	public function create_order($fullname,$email,$date,$bread,$souce,$cheese,$swtype,$veggies){

		$bread = mysqli_escape_string($this->db->connect,$bread);
		$souce = mysqli_escape_string($this->db->connect,$souce);
		$cheese = mysqli_escape_string($this->db->connect,$cheese);
		$swtype = mysqli_escape_string($this->db->connect,$swtype);
		$veggies = mysqli_escape_string($this->db->connect,$veggies);
		$date = mysqli_escape_string($this->db->connect,$date);
		$token = md5(rand()); // for unique token for verification
		$time = date("h:i:sa");
		$stmt = "INSERT INTO orders_tbl (fullName, email, odate, otime, bread, souce, swtype, cheese, veggies,token) values('$fullname','$email','$date','$time','$bread','$souce','$cheese','$swtype','$veggies','$token')";

		$result = $this->db->create($stmt);
		if($result!=false){
		    
			$last_id = $result; // the last id inserted;
			 $mailSend = new Mail();
				$mailSend->to = $email;
				 $mailSend->subject="Order Verification";
				  $mailSend->message="<html>
				<head>
				  <title>Order's  Summary</title>
				  <style rel='stylesheet' type='text/css'>
				  table{
				       border:2px solid grey;
				   
				     
				  }td,th{
				      border:2px solid grey;
				      padding:5px
				  }
				  </style>
				</head>
				<body>
				  <table>
				    <tr>
				      	<th>Date</th>
				      	<th>Time</th>
				      	<th>Bread</th>
				      	<th>Souce</th>
				      	<th>Cheese</th>
				      	<th>Swtype</th>
				      	<th>Veggies</th>
				    </tr>
				    <tr>
				      <td>$date</td>
				      <td>$time</td>
				      <td>$bread</td>
				      <td>souce</td>
				      <td>$cheese</td>
				      <td>$swtype</td>
				      <td>$veggies</td>
				    </tr>
				  </table>
				   <p>Follow the link to <span style='color:green'>verify</span> you order ".$_SERVER['SERVER_NAME']."/api/rest-api.php?oid=$last_id&action=verify&token=$token</p>
				    <p>Follow the link to <span style='color:red'>cancel</span> your order ".$_SERVER['SERVER_NAME']."/api/rest-api.php?oid=$last_id&action=cancel&token=$token</p>
				</body>
				</html>";
				//send email
			    if($mailSend->send()){
			         return true;
			    }else{
			         return false;
			    }
		}else{
			 return false;
		}

	}

	public function verify_order($oid,$token){

			$oid = mysqli_escape_string($this->db->connect,$oid);
			$token = mysqli_escape_string($this->db->connect,$token);

			//cheking if theres an order that matches the id and unique token given

			$stmt_check = "SELECT * FROM  orders_tbl where o_id=$oid and token='$token'";
			if($this->db->check_exist($stmt_check)==true){
				//update stmt
				 $stmt_update = "UPDATE orders_tbl set orderStat='onqueue' where o_id=$oid and token='$token'";
				 if($this->db->update($stmt_update)==TRUE){
					json_encode(array("Successfully Verified! Thank you."));
					header("location:../success.php?success=Successfully+Verified!+Thank+you");
					die();
					exit();
				 }else{
				 	array("Something went wrong when updating the status");
				 	 echo json_encode($string_message);
				 }
			}else{

				 $string_message = array("cant find your order");
				 echo json_encode($string_message);
			}

	}

	public function cancel_order($oid,$token){

			$oid = mysqli_escape_string($this->db->connect,$oid);
			$token = mysqli_escape_string($this->db->connect,$token);

			//cheking if theres an order that matches the id and unique token given

			$stmt_check = "SELECT * FROM  orders_tbl where o_id=$oid and token='$token'";
			if($this->db->check_exist($stmt_check)==true){
				//update stmt
				 $stmt_delete = "DELETE from orders_tbl where o_id=$oid and token='$token'";
				 if($this->db->delete($stmt_delete)==TRUE){
					json_encode(array("The order has been canceled."));
					header("location:../success.php?success=Successfully+Canceled the order");
					die();
					exit();
				 }else{
				 	array("Something went wrong while canceling your order");
				 	 echo json_encode($string_message);
				 }
			}else{

				 $string_message = array("cant find your order");
				 echo json_encode($string_message);
			}

	}	

}

$sanwiches = new Products();

//product update status #verify or cancel
if(isset($_GET['oid']) && isset($_GET['action']) && isset($_GET['token'])){

	if($_GET['action']=="verify"){
		$sanwiches->verify_order($_GET['oid'],$_GET['token']);
	}else if($_GET['action']=="cancel"){
		$sanwiches->cancel_order($_GET['oid'],$_GET['token']);
	}


}

// read available products

if(isset($_GET['extract']) && isset($_GET['category'])	){
	
	$sanwiches->read_products($_GET['category']);

}
//product create order
if(isset($_POST['insertorder'])){
	$errors = array("error");
	$message = array("success");
	//validating email
	
	$email = $_POST['email'];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    		$error = array_push($errors,"$email - not a valid email address");
    		
	}

	//validating name
	$fullname = $_POST['fullname'];
	if (!preg_match("/^[a-zA-Z ]*$/",$fullname))
            {
            	$errors = array_push($errors,"$fullname - Only letters and white space allowed");
            	
            }

     if(count($errors)>1){ // check errors
     		echo json_encode($errors); 
     }else{
			$sanwiches->create_order($fullname,$email,$_POST['date'],$_POST['bread'],$_POST['souce'],$_POST['cheese'],$_POST['swtype'],$_POST['veggies']);
			if($sanwiches==TRUE){
			    array_push($message,"Successfull! We just sent a Summary of order and confirmation link to $email, kindly expect the email within 5 minutes");
			    echo json_encode($message);
			}else{
			    array_push($errors,"Sorry, something went wrong. Please try again later.");
			    echo $json_encode($errors);
			}


     }


	/*
	
	*/

	

}





 ?>