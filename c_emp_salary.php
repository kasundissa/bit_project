<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kasun
 * Date: 21-Sep-19
 * Time: 1:41 PM
 */
include_once("config.php");
class emp_salary{
    public $sid;
    public $OT;
    public $bonus;
    public $deduction;
    public $usr_ID;

    private $db;

    function __construct()
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function register()
    {
        $c=0;
        foreach ($this->usr_ID as $item) {
            $sql = "insert into salary_details(OT,bonus,deduction,usr_ID)
               values('".$this->OT[$c]."','".$this->bonus[$c]."','".$this->deduction[$c]."','".$this->usr_ID[$c]."') ";
            $this->db->query($sql);
            $c++;
            // echo $sql;
        }
        return true;
    }
    function getall()
    {
        $sql="select * from salary_details";
        $res = $this->db->query($sql);
        $ar=array();
        while($row=$res->fetch_array()){
            $e=new emp_salary();
            $e->OT = $row['OT'];
            $e->bonus = $row['bonus'];
            $e->deduction = $row["deduction"];
            $e->usr_ID = $row['usr_ID'];
            $ar[]=$e;
        }
        return $ar;
    }
}