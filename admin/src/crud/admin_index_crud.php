<?php
/*---------------------------------------
CRUD: Gestion de l'entité recette
---------------------------------------*/


/*
	CR: créé un nouvel enregistrement  
	suppose un id auto-incrementé
*/

function create_reservation($conn, $num_reservation, $nom, $tel, $mail, $nb_personne, $nb_enfant, $num_table, $date){
	$sql="INSERT INTO `recette`(`num_reservation`,`nom`, `tel`, `mail`, `nb_personne`, `nb_enfant`, `num_table`, `date`) value('$num_reservation', '$nom','$tel', '$mail', '$nb_personne', '$nb_enfant', '$num_table', '$date')";
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 	
}

/*
	U: met à jour les valeurs de l'enregistrement 
*/
function update_reservation($conn, $num_reservation, $nom, $tel, $mail, $nb_personne, $nb_enfant, $num_table, $date){
	$sql="UPDATE `reservation` set `num_reservation`='$num_reservation', `nom`='$nom', `tel`='$tel', `mail`='$mail', `nb_personne`='$nb_personne', `nb_enfant`='$nb_enfant', `num_table`='$num_table', `date`='$date' WHERE `num_reservation`=$num_reservation" ;
	echo($sql) ;
	$ret=mysqli_query($conn, $sql) ;
        return $ret ; 
}


/*
	D: supprime l'enregistrement 
*/
function delete_reservation($conn, $num_reservation){
	$sql="DELETE FROM `reservation` WHERE `num_reservation`=$num_reservation" ;
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

/*
	S: selectionne les reservation pour une date donner 
*/
function select_reservation($conn, $date){
	$sql="SELECT * FROM `reservation` WHERE `date`= $date";
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 
}

?>