<?php

function update_resa($conn, $id, $nom, $tel, $mail, $nb, $date, $serv, $mess){
    $nom = addslashes($nom);
    $mail = addslashes($mail);
    $mess = addslashes($mess);
    $sql ="UPDATE `reservation` SET `nom` = '$nom', `telephone` = '$tel', `email`='$mail', `nbPersonne`='$nb', `date`='$date', `service`='$serv', `message`='$mess' WHERE `id` = '$id'";	
    //echo($sql);
	$ret=mysqli_query($conn, $sql);
        return $ret; 
}

function select_resa($conn, $id){
    $sql ="SELECT * FROM `reservation` WHERE `id` = $id"; 
    //echo($sql);
    $ret=mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($ret);
}

function liste_resa($conn,$jour){
    $sql="SELECT * FROM `reservation` WHERE `date`='$jour' AND `message` NOT LIKE '%<%' ORDER BY `service`";
    global $debeug;
    if($debeug)echo $sql;
    $res = mysqli_query($conn,$sql);
    return rs_menu_to_tab($res);
}

function delete_resa($conn, $id){
	$sql="DELETE FROM `reservation` WHERE `id`=$id" ;
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

function insert_resa($conn, $nom, $tel, $mail, $nb, $date, $serv, $mess){
    $nom = addslashes($nom);
    $mail = addslashes($mail);
    $mess = addslashes($mess);
    $sql ="INSERT INTO `reservation` (`nom`,`telephone`,`email`,`nbPersonne`,`date`,`service`,`message`) VALUES ('$nom','$tel','$mail','$nb','$date','$serv','$mess')";
    $ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

function rs_menu_to_tab($res){
    $tab=[];
    while($row=mysqli_fetch_assoc($res)){
        $tab[]=$row;}
        return $tab;
    }

    