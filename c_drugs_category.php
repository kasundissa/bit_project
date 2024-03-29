<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 20-May-19
 * Time: 11:48 AM
 */
include_once ("config.php");
class drugs_category{
    public $cat_id;
    public $cat_name;

    private $db;

    function __construct() //automatically call this function when you create an object from a class
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function register() //register a drugs category information in a database
    {
        $sql="insert into drugs_category(cat_name) values('$this->cat_name')";

        $this->db->query($sql);
        return true;
    }
    function update($id) //update a drugs category information in a database
    {
        $sql="update drugs_category set cat_name='$this->cat_name' where catid=$id";

        //echo $sql;

        $this->db->query($sql);
        return true;
    }
    function remove($cid) //remove a drugs category information in a database
    {
		$sql="update drugs_category set cat_status='del' where catid=$cid";
		
		//echo $sql;
		
		$this->db->query($sql);
		return true;
    }
    function getbyid($id) // get a drugs category details by id
    {
        $sql = "select * from drugs_category where cat_status='act' and catid=$id";
        $res = $this->db->query($sql);

        $row = $res->fetch_array();
        $c = new drugs_category();
        $c->cat_id = $row['catid'];
        $c->cat_name= $row['cat_name'];


        return $c;
    }
    function getall() //get all the information of every drugs categories in database
    {
		$sql="select * from drugs_category where cat_status='act'";
			$res = $this->db->query($sql);
			$ar=array();
			while($row=$res->fetch_array()){
				$p=new drugs_category();
				$p->cat_id = $row['catid'];
				$p->cat_name=$row['cat_name'];

				$ar[]=$p;
			}
		return $ar;
    }
}
?>