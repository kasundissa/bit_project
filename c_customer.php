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
    function remove()
    {

    }
    function change_pw()
    {

    }
    function getbyid()
    {

    }
    function getall()
    {

    }
}
?>