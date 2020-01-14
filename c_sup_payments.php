<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 28-Aug-19
 * Time: 1:41 PM
 */
include_once("config.php");
class sup_payments{
    public $pay_id;
    public $ref_no;
    public $amount;
    public $p_method;
    public $cheque_no;
    public $cheque_date;
    public $sup_id;
    public $date;

    private $db;

    function __construct() //automatically call this function when you create an object from a class
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function register() //to enter suppliers payments information into the system
    {
        $sql="insert into sup_payments(ref_no,amount,pay_method,cheque_no,cheque_date,sup_id) 
    values('$this->ref_no','$this->amount','$this->p_method','$this->cheque_no','$this->cheque_date','$this->sup_id')";

        $this->db->query($sql);
        return true;
    }
    function getall() //to get all the information of suppliers payments
    {
        $sql="select * from sup_payments";
        $res=$this->db->query($sql);
        $ar=array();
        include_once("c_supplier.php");
        $sup = new supplier();
        while ($row=$res->fetch_array())
        {
            $s=new sup_payments();
            $s->pay_id=$row["pay_id"];
            $s->ref_no=$row["ref_no"];
            $s->amount=$row["amount"];
            $s->date=$row["date"];
            $s->p_method=$row["pay_method"];
            $s->cheque_no=$row["cheque_no"];
            $s->cheque_date=$row["cheque_date"];
            $s->sup_id=$sup->getbyid($row["sup_id"]);
            $ar[]=$s;
        }
        return $ar;
    }
}
?>