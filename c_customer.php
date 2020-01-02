<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 16-May-19
 * Time: 6:33 PM
 */
include_once("config.php");
class customer{
    public $cus_ID;
    public $cus_Name;
    public $cus_NIC;
    public $loyalty_no;
    public $dob;
    public $cus_address;
    public $cus_mobile;
    public $cus_email;
    public $total_points;

    private $db;

    function __construct()
    {
        $this->db=new mysqli(server,username,password,dbname);
        $this->loyalty_no= rand(100000000,999999999);
    }
    function register()
    {
        $sql="insert into customer(cus_Name,cus_NIC,loyalty_card_no,date_of_birth,cus_address,cus_mobile,cus_email) 
        values('$this->cus_Name','$this->cus_NIC','$this->loyalty_no','$this->dob','$this->cus_address','$this->cus_mobile','$this->cus_email')";
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
        $mail->Subject = "Welcome to Sun City Pharmacy & Grocery";
        $mail->Body = "your Loyalty card no is ".$this->loyalty_no;
        $mail->AddAddress("$this->cus_email");

        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent";
        }
        return true;
    }
    function update($id)
    {
        $sql="update customer set cus_Name='$this->cus_Name',cus_NIC='$this->cus_NIC',loyalty_card_no='$this->loyalty_no',date_of_birth='$this->dob',cus_address='$this->cus_address',cus_mobile='$this->cus_mobile',cus_email='$this->cus_email'
              where cus_ID=$id";

        //echo $sql;

        $this->db->query($sql);
        return true;
    }
    function remove($cid)
    {
        $sql="update customer set cus_status='del' where cus_ID=$cid";

        $this->db->query($sql);
        return true;
    }

    function getbyid($id)
    {
        $sql = "select * from customer where cus_status='act' and cus_ID=$id";
        $res = $this->db->query($sql);

        $row = $res->fetch_array();
        $c = new customer();
        $c->cus_ID=$row['cus_ID'];
        $c->cus_Name=$row['cus_Name'];
        $c->cus_NIC=$row['cus_NIC'];
        $c->loyalty_no=$row['loyalty_card_no'];
        $c->dob=$row['date_of_birth'];
        $c->cus_address=$row['cus_address'];
        $c->cus_mobile=$row['cus_mobile'];
        $c->cus_email=$row['cus_email'];

        return $c;
    }
    function getall()
    {
        $sql="select *,sum(points) tot  from customer,points where cus_status='act' and customer.cus_ID=points.cus_ID group by  customer.cus_ID";
        $res=$this->db->query($sql);
        $ar=array();
        while($row=$res->fetch_array())
        {
            $c=new customer();
            $c->cus_ID=$row['cus_ID'];
            $c->cus_Name=$row['cus_Name'];
            $c->cus_NIC=$row['cus_NIC'];
            $c->loyalty_no=$row['loyalty_card_no'];
            $c->dob=$row['date_of_birth'];
            $c->cus_address=$row['cus_address'];
            $c->cus_mobile=$row['cus_mobile'];
            $c->cus_email=$row['cus_email'];
            $c->total_points=$row['tot'];
            $ar[]=$c;
        }
        return $ar;
    }

    function getbycode($LCN)
    {
        $sql = "select * from customer where cus_status='act' and loyalty_card_no=$LCN ";
        $res = $this->db->query($sql);

        $row = $res->fetch_array();
        $c = new customer();
        $c->cus_ID=$row['cus_ID'];
        $c->cus_Name=$row['cus_Name'];
        $c->cus_NIC=$row['cus_NIC'];
        $c->loyalty_no=$row['loyalty_card_no'];
        $c->dob=$row['date_of_birth'];
        $c->cus_address=$row['cus_address'];
        $c->cus_mobile=$row['cus_mobile'];
        $c->cus_email=$row['cus_email'];

        return $c;
    }
    function getpoints($PS){
        $sql = "select sum(points) ss from points where cus_ID=$PS";
       // echo $sql;
        $a = $this->db->query($sql);
        $row = $a->fetch_array();
        return $row["ss"];

    }
}
?>