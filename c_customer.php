<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 16-May-19
 * Time: 6:33 PM
 */
class customer{
    public $cus_ID;
    public $cus_Name;
    public $cus_password;
    public $cus_NIC;
    public $cus_address;
    public $cus_mobile;
    public $cus_email;

    private $db;

    function __construct()
    {
        $this->db=new mysqli("localhost","root","","Suncity");
    }
    function register()
    {
        $sql="insert into customer(cus_Name,cus_password,cus_NIC,cus_address,cus_mobile,cus_email) 
        values('$this->cus_Name','$this->cus_password','$this->cus_NIC','$this->cus_address','$this->cus_mobile','$this->cus_email')";
        $this->db->query($sql);
        return true;
    }
    function remove($cid)
    {
        $sql="update customer set cus_status='del' where cus_ID=$cid";

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
        $sql="select * from customer where cus_status='act'";
        $res=$this->db->query($sql);
        $ar=array();
        while($row=$res->fetch_array())
        {
            $c=new customer();
            $c->cus_ID=$row['cus_ID'];
            $c->cus_Name=$row['cus_Name'];
            $c->cus_password=$row['cus_password'];
            $c->cus_NIC=$row['cus_NIC'];
            $c->cus_address=$row['cus_address'];
            $c->cus_mobile=$row['cus_mobile'];
            $c->cus_email=$row['cus_email'];
            $ar[]=$c;
        }
        return $ar;
    }
}
?>