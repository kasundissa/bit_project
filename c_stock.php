<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 31-Dec-19
 * Time: 11:13 AM
 */
include_once("config.php");
class stock{
    public $st_id;
    public $ref_type;
    public $ref_no;
    public $st_date;
    public $item_name;
    public $st_in;
    public $st_out;
    public $st_bal;

    private $db;

    function __construct()
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function getall()
    {
        $sql="select *,(sum(st_in)-sum(st_out)) as bal from stock group by item_id";
       // echo $sql;
        $res=$this->db->query($sql);
        $ar=array();
        include_once("c_drugs.php");
        $d = new drugs();
        while ($row=$res->fetch_array())
        {
            $s=new stock();
            $s->st_id=$row['st_id'];
            $s->ref_type=$row['ref_type'];
            $s->ref_no=$row['ref_no'];
            $s->st_date=$row['st_date'];
            $s->item_name=$d->getbyid($row['item_id']);
            $s->st_in=$row['st_in'];
            $s->st_out=$row['st_out'];
            $s->st_bal=$row['bal'];

            $ar[]=$s;
        }
        return $ar;
    }
}
?>