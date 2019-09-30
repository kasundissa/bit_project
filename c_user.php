<?php
include_once("config.php");
class user{
	public $usr_ID;
	public $usr_Name;
	public $usr_password;
	public $usr_NIC;
	public $dob;
	public $usr_address;
	public $usr_mobile;
	public $usr_email;
	public $basic_salary;

	private $db;
	
	function __construct()
    {
		$this->db=new mysqli(server,username,password,dbname);
	}
	function register()
    {
		$sql="insert into user(usr_Name,usr_password,usr_NIC,date_of_birth,usr_address,usr_mobile,usr_email,basic_salary) 
             values('$this->usr_Name',md5('$this->usr_password'),'$this->usr_NIC','$this->dob','$this->usr_address','$this->usr_mobile','$this->usr_email','$this->basic_salary')";
		
		//echo $sql;
		
		$this->db->query($sql);
		return true;
	}


    function update($id)
    {
        $sql="update user set usr_Name='$this->usr_Name',usr_password=md5('$this->usr_password'),usr_NIC='$this->usr_NIC',date_of_birth='$this->dob',usr_address='$this->usr_address',usr_mobile='$this->usr_mobile',usr_email='$this->usr_email',basic_salary='$this->basic_salary'
              where usr_ID=$id";

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
	function getbyid($id)
    {
        $sql = "select * from user where usr_status='act' and usr_ID=$id";
        $res = $this->db->query($sql);


        //echo $sql;

        $row = $res->fetch_array();
        $u = new user();
        $u->usr_ID = $row['usr_ID'];
        $u->usr_Name = $row['usr_Name'];
        $u->usr_password = $row['usr_password'];
        $u->usr_NIC = $row['usr_NIC'];
        $u->dob = $row['date_of_birth'];
        $u->usr_address = $row['usr_address'];
        $u->usr_mobile = $row['usr_mobile'];
        $u->usr_email = $row['usr_email'];
        $u->basic_salary = $row['basic_salary'];

        return $u;
    }

    function login($un,$pw)
    {
        $sql = "select * from user where usr_Name='$un' and usr_password=md5('$pw')";
        $res = $this->db->query($sql);
        if ($res->num_rows==1)
        {
            $row = $res->fetch_array();
            session_start();
            $_SESSION["uid"]=$row["usr_ID"];
            return true;

        }
        else
            return false;

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
            $u->dob = $row['date_of_birth'];
			$u->usr_address=$row['usr_address'];
			$u->usr_mobile=$row['usr_mobile'];
			$u->usr_email=$row['usr_email'];
            $u->basic_salary = $row['basic_salary'];
			$ar[]=$u;
		}
		
		
		return $ar;
	}
}
?>