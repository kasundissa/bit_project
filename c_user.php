<?php
class user{
	public $usr_ID;
	public $usr_Name;
	public $usr_password;
	public $usr_NIC;
	public $usr_address;
	public $usr_mobile;
	public $usr_email;
	
	private $db;
	
	function __construct(){
		$this->db=new mysqli("localhost","root","","Suncity");
	}
	function register(){
		$sql="insert into user(usr_Name,usr_password,usr_NIC,usr_address,usr_mobile,usr_email)
		values('$this->usr_Name','$this->usr_password','$this->usr_NIC','$this->usr_address','$this->usr_mobile','$this->usr_email')";
		
		echo $sql;
		
		$this->db->query($sql);
		return true;
	}
	function remove(){
		
	}
	function change_pw(){
		
	}
	function getbyid(){
		
	}
	function getall(){
		
	}
}
?>