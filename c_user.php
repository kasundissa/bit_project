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
    public $role;

	private $db;
	
	function __construct() //automatically call this function when you create an object from a class
    {
		$this->db=new mysqli(server,username,password,dbname);
	}
	function register() //register user information in a database
    {
		$sql="insert into user(usr_Name,usr_password,usr_NIC,date_of_birth,usr_address,usr_mobile,usr_email,role,basic_salary) 
             values('$this->usr_Name',md5('$this->usr_password'),'$this->usr_NIC','$this->dob','$this->usr_address','$this->usr_mobile','$this->usr_email','$this->role','$this->basic_salary')";
		
		//echo $sql;
		
		$this->db->query($sql);
		return true;
	}


    function update($id) //to update the user details in a database
    {
        $sql="update user set usr_Name='$this->usr_Name',usr_password=md5('$this->usr_password'),usr_NIC='$this->usr_NIC',date_of_birth='$this->dob',usr_address='$this->usr_address',usr_mobile='$this->usr_mobile',usr_email='$this->usr_email',role='$this->role',basic_salary='$this->basic_salary'
              where usr_ID=$id";

        //echo $sql;

        $this->db->query($sql);
        return true;
    }


	function remove($uid) //to remove a user detail in a database
    {
		$sql="update user set usr_status='del' where usr_ID=$uid";
		
		//echo $sql;
		
		$this->db->query($sql);
		return true;
	}
	function reset_pwd($email,$pin_code,$new_pwd,$con_pwd) //to reset the user password
    {
		$sql = "select * from user where usr_email='$email' and random_no='$pin_code'";
        $res = $this->db->query($sql);
        if ($res->num_rows==1)
        {
            $sql2 = "update user set usr_password=md5('$new_pwd') where usr_email='$email'";
            $this->db->query($sql2);
            return true;

        }
        else
            return false;
	}
	function change_pwd($email,$old_password,$new_password,$confirm_password) //to change user password
    {
        $sql = "select * from user where usr_email='$email' and usr_password=md5('$old_password')";
        //echo $sql;
        $res = $this->db->query($sql);
        if ($res->num_rows==1)
        {
            $sql2 = "update user set usr_password=md5('$new_password') where usr_email='$email'";
            $this->db->query($sql2);
            return true;
        }
        else
            return false;
    }
	function getbyid($id) //get a user information by id
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
        $u->role = $row['role'];
        $u->basic_salary = $row['basic_salary'];

        return $u;
    }

    function login($un,$pw) //check user name and password to login the system
    {
        $sql = "select * from user where usr_Name='$un' and usr_password=md5('$pw')";
        $res = $this->db->query($sql);
        if ($res->num_rows==1)
        {
            $row = $res->fetch_array();
            session_start();
            $_SESSION["uid"]=$row["usr_ID"];
            $_SESSION["utype"]=$row["role"];
            return true;

        }
        else
            return false;

    }
    function password_recovery($eml) //to send an password recovery email
    {
        $r=rand(1000000,9999999);
        $sql="update user set random_no=$r where usr_email='$eml'";
        $this->db->query($sql);

        include_once("mail/src/PHPMailer.php");
        include_once("mail/src/SMTP.php");

        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "kasun.disanayake@gmail.com";
        $mail->Password = "kasundisa";
        $mail->SetFrom("kasun.disanayake@gmail.com");
        $mail->Subject = "Password Recovery";
        $mail->Body = "your pin no is ".$r;
        $mail->AddAddress("$eml");

        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }
        return true;
    }

	function getall() // get all the information of users
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
            $u->role = $row['role'];
            $u->basic_salary = $row['basic_salary'];
			$ar[]=$u;
		}
		
		
		return $ar;
	}
}
?>