<?php
class ConnectionDB{
	private $hostname;
	private $username;
	private $password;
	private $dbname;

	private $bbsname;
	private $bbspassword;
	private $email;

	public $resArray;
	public $link;
	public $result3;
	public $checkArray;

	public function __construct($username1,$password1,$email1){
		$this->bbsname = $username1;
		$this->passwordReg = $password1;
		$this->email = $email1;
	}

	public function run(){
		
		
		$this->_connectionDB();
		$this->selectDB();
	}

	public function _connectionDB(){
		$this->hostname = '127.0.0.1';
		$this->username = 'root';
		$this->password = '000000';
		$this->dbname = 'bbstest';
		$this->link = mysqli_connect("$this->hostname","$this->username","$this->password","$this->dbname");
		if (isset($this->link)) {
			echo "Mysql connect successful!";
		}else{
			echo "error!";
		}
		
	}

	public function insertDB(){
		$str1 = "insert into users(username,password,email) values('$this->bbsname','$this->passwordReg','$this->email')";
		$result1 = mysqli_query($this->link,$str1);
		if (isset($result1)) {
			echo "successful";
		}
	}

	public function selectDB(){

		$str2 = "select username,password from users where username='$this->bbsname'";
		$result2 = mysqli_query($this->link,$str2);
		$this->resArray = mysqli_fetch_array($result2);
		
	}

	public function checkDB(){
		$str3 = "select username from users where username='$this->bbsname'";
		$this->result3 = mysqli_query($this->link,$str3);
		$this->checkArray = mysqli_fetch_array($this->result3);
	}

	public function closeDB(){
		mysqli_close($this->link);
	}
}

?>