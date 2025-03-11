<?php
/*---------------------------------------
CRUD: Gestion de l'entité recette
---------------------------------------*/


/*
	CR: créé un nouvel enregistrement  
	suppose un id auto-incrementé
*/

function create_reservation($conn, $nom_recette, $aliment, $prix_recette, $temps_recette, $difficulte_recette, $id_utilisateur, $id_vin){
	$sql="INSERT INTO `recette`(`nom_recette`,`aliment`, `prix_recette`, `temps_recette`, `difficulte_recette`, `id_utilisateur`, `id_vin`) value('$nom_recette', '$aliment','$prix_recette', '$temps_recette', '$difficulte_recette', '$id_utilisateur', '$id_vin')";
	$ret=mysqli_query($conn, $sql) ;
	return $ret ; 	
}

/*
	U: met à jour les valeurs de l'enregistrement 
*/
function update_reservation($conn, $id_recette, $nom_recette, $aliment, $prix_recette, $temps_recette, $difficulte_recette, $id_utilisateur, $id_vin){
	$sql="UPDATE `recette` set `id_recette`='$id_recette', `nom_recette`='$nom_recette', `aliment`='$aliment', `prix_recette`='$prix_recette', `temps_recette`='$temps_recette', `difficulte_recette`='$difficulte_recette', `id_utilisateur`='$id_utilisateur', `id_vin`='$id_vin' WHERE `id_recette`=$id_recette" ;
	echo($sql) ;
	$ret=mysqli_query($conn, $sql) ;
        return $ret ; 
}


/*
	D: supprime l'enregistrement 
*/
function delete_reservation($conn, $id_recette){
	$sql="DELETE FROM `recette` WHERE `id_recette`=$id_recette" ;
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