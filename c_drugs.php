<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 19-May-19
 * Time: 12:43 PM
 */
class drugs{
    public $drug_id;
    public $drug_name;
    public $comp_name;
    public $description;
    public $batch_no;
    public $weight;
    public $manu_date;
    public $exp_date;
    public $price;

    private $db;

    function __construct()
    {
        $this->db=new mysqli("localhost","root","","Suncity");
    }
    function register()
    {
        $sql="insert into drugs(drg_name,company_name,description,batch_no,weight,manu_date,expi_date,price)
        values('$this->drug_name','$this->comp_name','$this->description','$this->batch_no','$this->weight','$this->manu_date','$this->exp_date','$this->price')";
        $this->db->query($sql);
        return true;
    }
    function remove()
    {

    }
    function change()
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