<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 01-Jan-20
 * Time: 12:55 PM
 */
include_once ("../config.php");
class online_sold_items{
    public $it_id;
    public $quantity;
    public $c_name;
    public $c_address;
    public $c_mobile;

    private $db;

    function __construct() //automatically call this function when you create an object from a class
    {
        $this->db=new mysqli(server,username,password,dbname);
    }

    function register()
    {
        $sql="insert into online_sold_items(it_id,qty,c_name,c_address,c_mobile) values('$this->it_id','$this->quantity','$this->c_name','$this->c_address','$this->c_mobile')";
        $this->db->query($sql); //to execute the query
        return true;
    }

}