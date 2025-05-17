<?php

function update_paragrapheMenu($conn, $id, $texte){
    $sql ="UPDATE `paragrapheMenu` SET `texte` = '$texte' WHERE `id` = $id"; 	
    //echo($sql);
	$ret=mysqli_query($conn, $sql);
        return $ret; 
}

function select_paragrapheMenu($conn,$id){
    $sql ="SELECT * FROM `paragrapheMenu`WHERE `id` = $id"; 
    //echo($sql);
    $ret=mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($ret);
}

function liste_paragrapheMenu($conn){
    $sql="SELECT * FROM `paragrapheMenu`";
    global $debeug;
    if($debeug)echo $sql;
    $res = mysqli_query($conn,$sql);
    return rs_to_tab($res);
}

function delete_paragrapheMenu($conn, $id){
	$sql="DELETE FROM `paragrapheMenu` WHERE `id`=$id" ;
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

function insert_paragrapheMenu($conn, $texte){
    $sql ="INSERT INTO `paragrapheMenu` (`id`, `texte`) VALUES (NULL, '$texte')";
    $ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

function rs_to_tab($res){
    $tab=[];
    while($row=mysqli_fetch_assoc($res)){
        $tab[]=$row;}
        return $tab;
    }

    