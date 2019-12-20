<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 19-May-19
 * Time: 12:43 PM
 */
include_once("config.php");
class drugs{
    public $drug_id;
    public $drug_name;
    public $brand_name;
    public $manufacturer_name;
    public $marketer_name;
    public $description;
    public $cat_id;
    public $cat;
    private $db;

    function __construct() //automatically call this function when you create an object from a class
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function register() //to store drug details in a database
    {
        $sql="insert into drugs(drg_name,brand_name,manufacturer,marketer,description,catid)
        values('$this->drug_name','$this->brand_name','$this->manufacturer_name','$this->marketer_name',
        '$this->description','$this->cat_id')";
        $this->db->query($sql); //to execute the query
        return true;
    }
    function update($id) //to update the drug details in a database
    {
        $sql="update drugs set drg_name='$this->drug_name',brand_name='$this->brand_name',manufacturer='$this->manufacturer_name',marketer='$this->marketer_name',description='$this->description',catid='$this->cat_id' where drg_id=$id";
        $this->db->query($sql);
        return true;
    }
    function remove($did) //to remove a drug detail in a database
    {
        $sql="update drugs set drug_status='del' where drg_id=$did";
        $this->db->query($sql);
        return true;
    }
    function getbyid($id)
    {
        $sql = "select * from drugs where drug_status='act' and drg_id=$id";
        $res = $this->db->query($sql);
        $row = $res->fetch_array();
        include_once("c_drugs_category.php");
        $c = new drugs_category();
        $d = new drugs();
        $d->drug_id=$row['drg_id'];
        $d->drug_name=$row['drg_name'];
        $d->brand_name=$row['brand_name'];
        $d->manufacturer_name=$row['manufacturer'];
        $d->marketer_name=$row['marketer'];
        $d->description=$row['description'];
        $d->cat=$c->getbyid($row['catid']);

        return $d;
    }
    function getall()
    {
        $sql="select * from drugs where drug_status='act'";
        $res=$this->db->query($sql);
        $ar=array();
        include_once("c_drugs_category.php");
        $c = new drugs_category();
        while ($row=$res->fetch_array())
        {
            $d=new drugs();
            $d->drug_id=$row['drg_id'];
            $d->drug_name=$row['drg_name'];
            $d->brand_name=$row['brand_name'];
            $d->manufacturer_name=$row['manufacturer'];
            $d->marketer_name=$row['marketer'];
            $d->description=$row['description'];
            $d->cat=$c->getbyid($row['catid']);


            $ar[]=$d;
        }
        return $ar;
    }
}
?>