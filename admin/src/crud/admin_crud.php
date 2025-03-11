<?php
include("db/db_conect.php");

function liste_admin($conn){
    $sql="SELECT * FROM `administrateur`";
    global $debeug;
    if($debeug)echo $sql;
    $res = mysqli_query($conn,$sql);
    return rs_to_tab($res);
}

function rs_to_tab($res){
    $tab=[];
    while($row=mysqli_fetch_assoc($rs)){
        $tab[]=$row;}
        return $tab;
    }
}