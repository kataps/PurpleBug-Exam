<?php 
class Database{
	private $servername;
	private $username;
	private $password; // password here;
	private $dbname;
	protected $connect;

	protected function __construct(){
			
			$this->host="localhost";
            $this->username="root";//
            $this->password="";
            $this->dbname="preorder_db";
            
			
			try{
					$this->connect= new mysqli($this->servername,$this->username,$this->password,$this->dbname);
					if(mysqli_connect_error()){
					die("There is an erro White Connecting to server(".mysqli_connect_errno().")::".mysqli_connect_error());
					}
					else{}
			}
					catch(Exception $e){
					echo $e->getMessage();
			}

	}
	protected function create($stmt){

		$result = mysqli_query($this->connect,$stmt);
		$last_id = mysqli_insert_id($this->connect);
		if($result){
			return $last_id;
		}else{
			echo mysqli_error($this->connect);
			return false;
		}
	}
	
	protected function read($stmt){
		
		$result = mysqli_query($this->connect,$stmt);
		$data = [];
        /*
        #compatibily issues due to php version  
         /not working in my cpanel

		$result = mysqli_query($this->connect,$stmt);
		$result = $result->fetch_all( MYSQLI_ASSOC );
		$json_format = json_encode($result);
		return $json_format;

		*/
		#working in my xampp localhost and cpanel
		#thanks to stackoverlow :D
			
		while ($row = $result->fetch_assoc()) {
    	$data[] = $row;
    	
		}
		$json_format = json_encode($data);
		return $json_format;
		
	}
	protected function update($stmt){
			if($this->connect->query($stmt)==true){
				 return true;
			}else{
				echo mysqli_error($this->connect);
				 return false;
			}
	}

	protected function delete($stmt){
			if($this->connect->query($stmt)==true){
				 return true;
			}else{
				echo mysqli_error($this->connect);
				 return false;
			}
	}

	//check exist
	protected function check_exist($stmt){

			$result = $this->connect->query($stmt);
			
		if($result){
			$rows = mysqli_num_rows($result);
			
				if($rows>0){
					return true;
				}else{
					 return false;
				}
		}else{
				echo mysqli_error($this->connect);
		}

	}
	

}


 ?>