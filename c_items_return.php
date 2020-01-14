<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 25-Nov-19
 * Time: 2:55 PM
 */
include_once("config.php");
class items_return
{
   public $return_id;
   public $pos_id;

   public $it_name;
   public $price;
   public $qty;
   public $amount;

   public $points;
   public $cus_id;

   private $db;

    function __construct() //automatically call this function when you create an object from a class
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
   function register()
   {
       $sql="insert into items_return(pos_id)  values('$this->pos_id')"; //to add bill number into the database
       $this->db->query($sql);
       $rid=$this->db->insert_id;
       // echo $sql;
       $c=0;
       foreach ($this->it_name as $item) {
           $x=$_POST["sp_id"][$c];
           if (isset($_POST["chk"][$x])) {
               $sql = "insert into returned_items(it_name,price,quantity,amount,return_id) 
                       values('" . $this->it_name[$c] . "','" . $this->price[$c] . "','" . $this->qty[$c] . "','" . $this->amount[$c] . "','" . $rid . "')";
               $this->db->query($sql);
              // echo $sql;

               $sql3 = "insert into stock(ref_type,ref_no,item_id,st_in,st_out)
              values ('Return','".$rid."','".$this->it_name[$c]."','".$this->qty[$c]."','0')";
               $this->db->query($sql3);
              // echo $sql3;
               $c++;

           }
       }
       if (isset($_POST["cid"])){ //if necessary loyalty customer can convert return amount into points
           $sql2 = "insert into points(points,pos_id,cus_ID)
                    values ('$this->points','$rid','$this->cus_id')";
           $this->db->query($sql2);
          // echo $sql2;
       }
       return true;
   }


}