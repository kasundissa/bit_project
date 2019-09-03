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
    public $amount;
    public $p_method;
    public $cheque_no;
    public $cheque_date;
    public $sup_id;

    private $db;

    function __construct()
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function register()
    {
        $sql="insert into sup_payments(amount,pay_method,cheque_no,cheque_date,sup_id) 
    values('$this->amount','$this->p_method','$this->cheque_no','$this->cheque_date','$this->sup_id')";

        $this->db->query($sql);
        return true;
    }
}