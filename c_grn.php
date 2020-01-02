<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 24-Jul-19
 * Time: 10:39 AM
 */
include_once("config.php");
class grn{

    public $grn_id;
    public $ref_no;
    public $supplier;
    public $total_cost;

    public $drug_name;
    public $pack_size;
    public $no_of_packs;
    public $batch_no;
    public $weight;
    public $manufacture_date;
    public $expire_date;
    public $unit_price;
    public $selling_price;
    public $cost;
    //public $drg;

    private $db;

    function __construct()
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function register()
    {
        $sql="insert into grn(ref_no,sup_id,total_cost) 
        values('$this->ref_no','$this->supplier','$this->total_cost')";
        $this->db->query($sql);
        $gid=$this->db->insert_id;


        $c=0;
        $d=0;
        foreach ($this->drug_name as $item){

            $sql="insert into drug_product(drg_name,pk_size,no_of_pks,batch_no,weight,manufacture_date,expire_date,un_price,sl_price,cost,grn_id) 
        values('".$this->drug_name[$c]."','".$this->pack_size[$c]."','".$this->no_of_packs[$c]."','".$this->batch_no[$c]."','".$this->weight[$c]."','".$this->manufacture_date[$c]."','".$this->expire_date[$c]."','".$this->unit_price[$c]."','".$this->selling_price[$c]."','".$this->cost[$c]."','".$gid."')";
            $this->db->query($sql);
            //  echo $sql;
            $qty[$d]= $this->pack_size[$c]*$this->no_of_packs[$c];

            $sql3 = "insert into stock(ref_type,ref_no,item_id,st_in,st_out)
              values ('GRN','".$gid."','".$this->drug_name[$c]."','".$qty[$d]."','0')";
            $this->db->query($sql3);
            // echo $sql3;
            $c++;
            $d++;
        }

        return true;
    }
    function getall()
    {
        $filter="";
        if (isset($_POST["st_date"])) {
            $d1 = $_POST["st_date"];
            $d2 = $_POST["end_date"];
            $cat = $_POST["category"];
            $sql = "select * from grn,drug_product where grn.grn_id=drug_product.grn_id AND date(`date`)>='$d1' AND date(`date`)<='$d2' AND drug_product.drg_name='$cat'";
            //echo $sql;
            $res = $this->db->query($sql);
            $ar = array();
            include_once("c_drugs.php");
            $d = new drugs();
            while ($row = $res->fetch_array()) {
                $g = new grn();

                $g->drug_name = $d->getbyid($row["drg_name"]);
                $g->pack_size = $row["pk_size"];
                $g->no_of_packs = $row["no_of_pks"];
                $g->batch_no = $row["batch_no"];
                $g->weight = $row["weight"];
                $g->manufacture_date = $row["manufacture_date"];
                $g->expire_date = $row["expire_date"];
                $g->unit_price = $row["un_price"];
                $g->selling_price = $row["sl_price"];
                $g->cost = $row["cost"];

                $ar[] = $g;
            }


            return $ar;
        }
    }
    function get_by_id($id)
    {

        $ar = array();


            $sql = "select * from grn,drug_product where grn.grn_id=drug_product.grn_id and grn.ref_no=$id";
            $res = $this->db->query($sql);
            include_once("c_drugs.php");
            $d = new drugs();

            while ($row = $res->fetch_array()) {
                $g = new grn();

                $g->drug_name = $d->getbyid($row["drg_name"]);
                $g->pack_size = $row["pk_size"];
                $g->no_of_packs = $row["no_of_pks"];
                $g->batch_no = $row["batch_no"];
                $g->weight = $row["weight"];
                $g->manufacture_date = $row["manufacture_date"];
                $g->expire_date = $row["expire_date"];
                $g->unit_price = $row["un_price"];
                $g->selling_price = $row["sl_price"];
                $g->cost = $row["cost"];
                $ar[] = $g;
            }

        return $ar;
    }
}