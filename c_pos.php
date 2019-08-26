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
  public $bill_no;
  public $tot_amount;
  public $tot_discount;
  public $sub_tot;



  public $i_name;
  public $price;
  public $qty;
  public $amt;
  public $discount;

  private $db;


    function __construct()
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function register()
    {
        $sql="insert into pos(bill_no,tot_amount,tot_discount,sub_tot) 
        values('$this->bill_no','$this->tot_amount','$this->tot_discount','$this->sub_tot')";
        $this->db->query($sql);
        //echo $sql;
        $pid=$this->db->insert_id;


        $c=0;
        foreach ($this->i_name as $item){

            $sql="insert into sold_product(it_name,price,quantity,amount,discount,pos_id) 
             values('".$this->i_name[$c]."','".$this->price[$c]."','".$this->qty[$c]."','".$this->amt[$c]."','".$this->discount[$c]."','".$pid."')";
            $this->db->query($sql);
            $c++;
            //  echo $sql;
        }

        return true;
    }

}