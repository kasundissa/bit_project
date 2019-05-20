<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 20-May-19
 * Time: 11:48 AM
 */
class product_category{
    public $cat_id;
    public $cat_code;
    public $cat_name;

    private $db;

    function __construct()
    {
        $this->db=new mysqli("localhost","root","","Suncity");
    }
    function register()
    {
        $sql="insert into product_category(cat_code,cat_name) values('$this->cat_code','$this->cat_name')";

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