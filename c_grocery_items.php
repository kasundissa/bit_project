<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 23-Jul-19
 * Time: 12:15 PM
 */
include_once("config.php");
class grocery_items{

    public $it_id;
    public $it_name;
    public $brand_name;
    public $manufacturer_name;
    public $marketer_name;
    public $description;
    public $price;

    private $db;

    function __construct()
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function register()
    {
        $sql = "insert into grocery_items(git_name,brand_name,manufacturer,marketer,description,price)
                values ('$this->it_name','$this->brand_name','$this->manufacturer_name','$this->marketer_name','$this->description','$this->price')";
        $this->db->query($sql);

        $inid= $this->db->insert_id;
        $path = "pimg/$inid.jpg";
        move_uploaded_file($_FILES["item_logo"]["tmp_name"],$path);

        return true;
    }
    function update($id)
    {

        if (isset($_FILES["item_logo"])){
            $inid = $id;
            $path = "pimg/$inid.jpg";
            move_uploaded_file($_FILES["item_logo"]["tmp_name"],$path);

        }
        $sql="update grocery_items set git_name='$this->it_name',brand_name='$this->brand_name',manufacturer='$this->manufacturer_name',marketer='$this->marketer_name',description='$this->description',price='$this->price'
              where git_id=$id";
        $this->db->query($sql);
        return true;
    }
    function remove($gid)
    {
        $sql="update grocery_items set git_status='del' where git_id=$gid";
        $this->db->query($sql);
        return true;
    }
    function getbyid($id)
    {
        $sql = "select * from grocery_items where git_status='act' and git_id=$id";
        $res = $this->db->query($sql);

        $row = $res->fetch_array();
        $g=new grocery_items();
        $g->it_id=$row['git_id'];
        $g->it_name=$row['git_name'];
        $g->brand_name=$row['brand_name'];
        $g->manufacturer_name=$row['manufacturer'];
        $g->marketer_name=$row['marketer'];
        $g->description=$row['description'];
        $g->price=$row['price'];

        return $g;
    }
    function getall()
    {
        $sql="select * from grocery_items where git_status='act'";
        $res=$this->db->query($sql);
        $ar=array();
        while($row=$res->fetch_array())
        {
            $g=new grocery_items();
            $g->it_id=$row['git_id'];
            $g->it_name=$row['git_name'];
            $g->brand_name=$row['brand_name'];
            $g->manufacturer_name=$row['manufacturer'];
            $g->marketer_name=$row['marketer'];
            $g->description=$row['description'];
            $g->price=$row['price'];
            $ar[]=$g;
        }
        return $ar;
    }
}
?>