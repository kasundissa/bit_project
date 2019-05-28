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
	
	function __construct()
    {
		$this->db=new mysqli("localhost","root","","Suncity");
	}
	function register()
    {
		$sql="insert into user(usr_Name,usr_password,usr_NIC,usr_address,usr_mobile,usr_email)
		values('$this->usr_Name','$this->usr_password','$this->usr_NIC','$this->usr_address','$this->usr_mobile','$this->usr_email')";
		
		//echo $sql;
		
		$this->db->query($sql);
		return true;
	}
	function remove($uid)
    {
		$sql="update user set usr_status='del' where usr_ID=$uid";
		
		//echo $sql;
		
		$this->db->query($sql);
		return true;
	}
	function change_pw()
    {
		
	}
	function getbyid()
    {
		
	}
	function getall()
    {
		$sql="select * from user where usr_status='act'";
		$res = $this->db->query($sql);
		$ar=array();
		while($row=$res->fetch_array()){
			$u=new user();
			$u->usr_ID = $row['usr_ID'];
			$u->usr_Name =$row['usr_Name'];
			$u->usr_password=$row['usr_password'];
			$u->usr_NIC=$row['usr_NIC'];
			$u->usr_address=$row['usr_address'];
			$u->usr_mobile=$row['usr_mobile'];
			$u->usr_email=$row['usr_email'];
			$ar[]=$u;
		}
		
		
		return $ar;
	}
}
?>