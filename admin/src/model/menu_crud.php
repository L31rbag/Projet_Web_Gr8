<?php

function update_menu($conn, $id, $nom, $descr, $prix, $type){
    $descr = addslashes($descr);
    $nom = addslashes($nom);
    $sql ="UPDATE `menu` SET `nom` = '$nom',`description` = '$descr',`prix`='$prix',`type`='$type' WHERE `id` = '$id'";	
    echo($sql);
	$ret=mysqli_query($conn, $sql);
        return $ret; 
}

function select_menu($conn,$id){
    $sql ="SELECT * FROM `menu`WHERE `id` = $id"; 
    echo($sql);
    $ret=mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($ret);
}

function liste_menu($conn){
    $sql="SELECT * FROM `menu`";
    global $debeug;
    if($debeug)echo $sql;
    $res = mysqli_query($conn,$sql);
    return rs_menu_to_tab($res);
}

function delete_menu($conn, $id){
	$sql="DELETE FROM `menu` WHERE `id`=$id" ;
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

function insert_menu($conn, $nom, $descr,$prix,$type){
    $descr = addslashes($descr);
    $nom = addslashes($nom);
    $sql ="INSERT INTO `menu` (`nom`,`description`,`prix`,`type`) VALUES ('$nom','$descr','$prix','$type')";
    $ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

function rs_menu_to_tab($res){
    $tab=[];
    while($row=mysqli_fetch_assoc($res)){
        $tab[]=$row;}
        return $tab;
    }

    