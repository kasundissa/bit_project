<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 15-Aug-19
 * Time: 11:58 AM
 */
include_once("config.php");
class pos{

  public $pos_id;
  public $tot_amount;
  public $tot_discount;
  public $sub_tot;
  public $net_tot;
  public $datetime;

  public $sold_product_id;
  public $i_name;
  public $price;
  public $qty;
  public $amt;
  public $discount;

    public $pid;
    public $points;
    public $cus_id;

  private $db;


    function __construct()
    {
        $this->db=new mysqli(server,username,password,dbname);
    }


    function getbyid($id)
    {
        $sql = "select * from pos,sold_product where pos.pos_id=sold_product.pos_id and pos.pos_id=$id";
        $res = $this->db->query($sql);
		$ar=array();
		while($row=$res->fetch_array()) {
           $p=new pos();

            $p->sold_product_id=$row["sp_id"];
            $p->discount=$row["discount"];
            $p->i_name=$row["it_name"];
            $p->price=$row["price"];
            $p->qty=$row["quantity"];
            $p->amt=$row["amount"];

            $ar[]=$p;
        }

        return $ar;
    }
    function get_by_id_for_return($id)
    {
        $sql = "select * from items_return where pos_id=$id";
        $res = $this->db->query($sql);
        $ar = array();
        if($res->num_rows==0) {

            $sql = "select * from pos,sold_product where pos.pos_id=sold_product.pos_id and (date(current_date())-date(`date`))<14 and pos.pos_id=$id";
            $res = $this->db->query($sql);
            include_once("c_drugs.php");
            $d = new drugs();

            while ($row = $res->fetch_array()) {
                $p = new pos();

                $p->sold_product_id = $row["it_name"];
                $p->discount = $row["discount"];
                $p->i_name = $d->getbyid($row["it_name"]);
                $p->price = $row["price"];
                $p->qty = $row["quantity"];
                $p->amt = $row["amount"];


                $ar[] = $p;
            }
        }
        return $ar;
    }
    function getall()
    {
        $filter="";
        if (isset($_POST["st_date"])) {
            $d1 = $_POST["st_date"];
            $d2 = $_POST["end_date"];
            $cat = $_POST["category"];
            $sql = "select * from pos,sold_product where pos.pos_id=sold_product.pos_id AND date(`date`)>='$d1' AND date(`date`)<='$d2' AND sold_product.it_name='$cat'";
            //echo $sql;
            $res = $this->db->query($sql);
            $ar = array();
            include_once ("c_drugs.php");
            $d = new drugs();
            while ($row = $res->fetch_array()) {
                $p = new pos();

                $p->discount = $row["discount"];
                $p->i_name = $d->getbyid($row["it_name"]);
                $p->price = $row["price"];
                $p->qty = $row["quantity"];
                $p->amt = $row["amount"];

                $ar[] = $p;
            }


            return $ar;
        }
    }




    function register()
    {
        $sql="insert into pos(tot_amount,tot_discount,sub_tot,net_tot) 
        values('$this->tot_amount','$this->tot_discount','$this->sub_tot','$this->net_tot')";
        $this->db->query($sql);
        //echo $sql;
        $pid=$this->db->insert_id;


        $c=0;
        foreach ($this->i_name as $item){

            $sql="insert into sold_product(it_name,price,quantity,amount,discount,pos_id) 
             values('".$this->i_name[$c]."','".$this->price[$c]."','".$this->qty[$c]."','".$this->amt[$c]."','".$this->discount[$c]."','".$pid."')";
            $this->db->query($sql);

           // echo $sql;
            $sql3 = "insert into stock(ref_type,ref_no,item_id,st_in,st_out)
              values ('Sale','".$pid."','".$this->i_name[$c]."','0','".$this->qty[$c]."')";
            $this->db->query($sql3);
           // echo $sql3;
            $c++;
        }

        if (!$_POST["pts"]>0){
            $sql2 = "insert into points(points,pos_id,cus_ID)
                    values ('$this->points','$pid','$this->cus_id')";
            $this->db->query($sql2);
        }

        //echo($sql2);



        return $pid;
    }
    function reset_points($rsp,$points,$pid)
    {
        $sql = "insert into points(points,cus_ID,pos_id)
                values ($points*(-1),$rsp,$pid)";

       // $sql = "insert into points set points=0.00 where cus_ID=$rsp";
        $this->db->query($sql);

        return true;
    }
    function get_all_for_print($id)
    {

            $sql = "select * from pos,sold_product where pos.pos_id=sold_product.pos_id AND pos.pos_id=$id";
            //echo $sql;
             include_once("c_drugs.php");
             $d = new drugs();
            $res = $this->db->query($sql);
            $ar = array();
            while ($row = $res->fetch_array()) {
                $p = new pos();
                $p->pos_id = $row["pos_id"];
                $p->datetime = $row["date"];
                $p->discount = $row["discount"];
                $p->i_name = $d->getbyid($row["it_name"]);
                $p->price = $row["price"];
                $p->qty = $row["quantity"];
                $p->amt = $row["amount"];
                $p->tot_amount = $row["tot_amount"];
                $p->tot_discount = $row["tot_discount"];
                $p->sub_tot = $row["sub_tot"];
                $p->net_tot = $row["net_tot"];
                $ar[] = $p;
            }
            return $ar;

    }


}