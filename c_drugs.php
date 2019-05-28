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
    function remove($did)
    {
        $sql="update drugs set drug_status='del' where drg_id=$did";
        $this->db->query($sql);
        return true;
    }
    function change()
    {

    }
    function getbyid()
    {

    }
    function getall()
    {
        $sql="select * from drugs where drug_status='act'";
        $res=$this->db->query($sql);
        $ar=array();
        while ($row=$res->fetch_array())
        {
            $d=new drugs();
            $d->drug_id=$row['drg_id'];
            $d->drug_name=$row['drg_name'];
            $d->comp_name=$row['company_name'];
            $d->description=$row['description'];
            $d->batch_no=$row['batch_no'];
            $d->weight=$row['weight'];
            $d->manu_date=$row['manu_date'];
            $d->exp_date=$row['expi_date'];
            $d->price=$row['price'];

            $ar[]=$d;
        }
        return $ar;
    }
}
?>