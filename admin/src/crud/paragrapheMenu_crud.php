<?php

function update_paragrapheMenu($conn, $id, $texte){
    $sql ="UPDATE `paragrapheMenu` SET `texte` = '$texte' WHERE $id = 1"; 	
    echo($sql);
	$ret=mysqli_query($conn, $sql);
        return $ret; 
}

function liste_paragrapheMenu($conn){
    $sql="SELECT * FROM `paragrapheMenu`";
    global $debeug;
    if($debeug)echo $sql;
    $res = mysqli_query($conn,$sql);
    return rs_to_tab($res);
}

function rs_to_tab($res){
    $tab=[];
    while($row=mysqli_fetch_assoc($res)){
        $tab[]=$row;}
        return $tab;
    }