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
    public $year;
    public $month;
    public $epf;
    public $etf;
    public $tot_salary;

    private $db;

    function __construct() //automatically call this function when you create an object from a class
    {
        $this->db=new mysqli(server,username,password,dbname);
    }
    function register() //register salary information in monthly
    {
        include_once("c_user.php");
        $em = new user();


        $c=0;
        foreach ($this->usr_ID as $item) {

            $emd = $em->getbyid($this->usr_ID[$c]);
            $b_sal = $emd->basic_salary;
            //echo $b_sal;

            $epf = $b_sal * 0.08; //calculate epf
            $etf = $b_sal * 0.02; //calculate etf
            $tot_sal = $b_sal - $epf - $etf + $this->OT[$c] + $this->bonus[$c] - $this->deduction[$c]; //calculate final salary amount

            $sql = "insert into salary_details(`year`,`month`,OT,bonus,deduction,usr_ID,epf,etf,tot_salary)
               values('" . $this->year . "','" . $this->month . "','" . $this->OT[$c] . "','" . $this->bonus[$c] . "','" . $this->deduction[$c] . "','" . $this->usr_ID[$c] . "','" . $epf . "','" . $etf . "','" . $tot_sal . "') ";
            $this->db->query($sql);
            $c++;
            //echo $sql;
        }
        return true;
    }
    function getbyid($id,$month,$year) //get salary details of a user by user's id
    {
        $sql = "select * from salary_details join `user` on salary_details.usr_ID=`user`.usr_ID where `user`.usr_ID=$id AND salary_details.month='$month' AND salary_details.year='$year'";
        $res = $this->db->query($sql);
        //echo $sql;
        $row = $res->fetch_array();
        $e = new emp_salary();
        //$e->name = $row['usr_Name'];
       // $e->address = $row['usr_address'];
        //$e->phone = $row['usr_mobile'];
        //$e->basic_sal = $row['basic_salary'];
        $e->year = $row['year'];
        $e->month = $row['month'];
        $e->OT = $row['OT'];
        $e->bonus = $row['bonus'];
        $e->deduction = $row["deduction"];
        $e->usr_ID = $row['usr_ID'];
        $e->epf = $row["epf"];
        $e->etf = $row["etf"];
        $e->tot_salary = $row["tot_salary"];

        return $e;
    }
    function getall()
    {
        $sql="select * from salary_details";
        $res = $this->db->query($sql);
        $ar=array();
        while($row=$res->fetch_array()){
            $e=new emp_salary();
            $e->year = $row['year'];
            $e->month = $row['month'];
            $e->OT = $row['OT'];
            $e->bonus = $row['bonus'];
            $e->deduction = $row["deduction"];
            $e->usr_ID = $row['usr_ID'];
            $e->epf = $row["epf"];
            $e->etf = $row["etf"];
            $e->tot_salary = $row["tot_salary"];
            $ar[]=$e;
        }
        return $ar;
    }
}