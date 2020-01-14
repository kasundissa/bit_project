<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 16-Jul-19
 * Time: 1:04 PM
 */
include_once("config.php");
class supplier{
    public $supplier_id;
    public $supplier_name;
    public $company_name;
    public $contact_no;

    private $db;

    function __construct() //automatically call this function when you create an object from a class
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function register()
    {
        $sql = "insert into supplier(sup_name,company_name,contact_no) values('$this->supplier_name','$this->company_name','$this->contact_no')";
        $this->db->query($sql);
        return true;
    }
    function update($id) //register supplier information in a database
    {
        $sql="update supplier set sup_name='$this->supplier_name',company_name='$this->company_name',contact_no='$this->contact_no' where sup_id=$id";
        $this->db->query($sql);
        return true;
    }
    function remove($sid) //to remove supplier information in a database
    {
        $sql="update supplier set sup_status='del' where sup_id=$sid";
        $this->db->query($sql);
        return true;
    }
    function getbyid($id) // get supplier details by id
    {
        $sql="select * from supplier where sup_status='act' and sup_id=$id";
        $res=$this->db->query($sql);

        $row=$res->fetch_array();
        $s=new supplier();
        $s->supplier_id=$row["sup_id"];
        $s->supplier_name=$row["sup_name"];
        $s->company_name=$row["company_name"];
        $s->contact_no=$row["contact_no"];

        return $s;
    }
    function getall() //to get all the information of suppliers
    {
        $sql="select * from supplier where sup_status='act'";
        $res=$this->db->query($sql);
        $ar=array();
        while ($row=$res->fetch_array())
        {
            $s=new supplier();
            $s->supplier_id=$row["sup_id"];
            $s->supplier_name=$row["sup_name"];
            $s->company_name=$row["company_name"];
            $s->contact_no=$row["contact_no"];
            $ar[]=$s;
        }
        return $ar;
    }
}
?>