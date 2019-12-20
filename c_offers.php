<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 03-Nov-19
 * Time: 3:04 PM
 */
include_once("config.php");
class offers{
    public $offer_id;
    public $item_name;
    public $discount;
    public $start_date;
    public $end_date;

    private $db;

    function __construct()
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function register()
    {
        $sql="insert into offers(it_name,discount,start_date,end_date)
        values('$this->item_name','$this->discount','$this->start_date','$this->end_date')";
        $this->db->query($sql);
        return true;
    }
    function getall()
    {
        $sql="select * from offers";
        $res = $this->db->query($sql);
        $ar=array();
        include_once("c_grocery_items.php");
        $g = new grocery_items();
        while($row=$res->fetch_array()){
            $o = new offers();
            $o->offer_id = $row['offer_id'];

            $o->item_name = $g->getbyid($row['it_name']);
            $o->discount = $row['discount'];
            $o->start_date = $row['start_date'];
            $o->end_date = $row['end_date'];

            $ar[]=$o;
        }


        return $ar;
    }
}
?>