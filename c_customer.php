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

    private $db;

    function __construct()
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function register()
    {
        $sql="insert into customer(cus_Name,cus_NIC,loyalty_card_no,date_of_birth,cus_address,cus_mobile,cus_email) 
        values('$this->cus_Name','$this->cus_NIC','$this->loyalty_no','$this->dob','$this->cus_address','$this->cus_mobile','$this->cus_email')";
        $this->db->query($sql);
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
        $sql="select * from customer where cus_status='act'";
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
            $ar[]=$c;
        }
        return $ar;
    }
}
?>