<?php 

class Mail{

	 public $to;
	 public $subject;
	 public $message;
	 public $headers;

	 public function __construct(){
	 	$this->headers = 'From: preorder@comany.com' . "\r\n" .
    	'Reply-To: preorder@comany.com' . "\r\n" .
    	'X-Mailer: PHP/' . phpversion();
    	$this->headers.= 'MIME-Version: 1.0' . "\r\n";
		$this->headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	 }
	 public function send(){
	 		
	 		if(mail($this->to, $this->subject, $this->message, $this->headers)){
	 		    return true;
	 		}else{
	 		    return false;
	 		}
	 }

}

?>