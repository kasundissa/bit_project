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
    function remove($cid)
    {
		$sql="update product_category set cat_status='del' where catid=$cid";
		
		//echo $sql;
		
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
		$sql="select * from product_category where cat_status='act'";
			$res = $this->db->query($sql);
			$ar=array();
			while($row=$res->fetch_array()){
				$p=new product_category();
				$p->cat_id = $row['catid'];
				$p->cat_code =$row['cat_code'];
				$p->cat_name=$row['cat_name'];

				$ar[]=$p;
			}
		return $ar;
    }
}
?>