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
        foreach ($this->drug_name as $item){

            $sql="insert into drug_product(drg_name,pk_size,no_of_pks,batch_no,weight,manufacture_date,expire_date,un_price,sl_price,cost,grn_id) 
        values('".$this->drug_name[$c]."','".$this->pack_size[$c]."','".$this->no_of_packs[$c]."','".$this->batch_no[$c]."','".$this->weight[$c]."','".$this->manufacture_date[$c]."','".$this->expire_date[$c]."','".$this->unit_price[$c]."','".$this->selling_price[$c]."','".$this->cost[$c]."','".$gid."')";
            $this->db->query($sql);
         $c++;
         //  echo $sql;
        }

        return true;
    }

}