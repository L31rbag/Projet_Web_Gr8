<?php
include("../../db/db_connect.php");
include("../src/crud/paragrapheMenu_crud.php");
include("../src/vue/paragrapheMenu_vue.php") ;

session_start();
if(!$_SESSION["admin"]){
    header("Location: admin_log.php");
  }

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>AdminTexte</title>
  <link rel="stylesheet" href="../style/texte.css">
</head>

<header>
    <a href="./admin_resa.php">Reservation</a>
    <h1>Admin</h1>
    <img class="img_logo" src="../src/image/Ziravene_logo.jpg"/>
</header>

<body>

<?php

/**
 * Controlleur : Traite les actions provenant des requetes POST et GET
 */

if(isset($_GET["action"]) && isset($_GET["id"])){

	$action=$_GET["action"];
	$id=$_GET["id"];

	if($action=="update"){
		
		/* Formulaire de maj d'un etudiant */
		$paragraphe=select_paragrapheMenu($conn, $id) ;
		$html=html_form_maj($paragraphe) ;
		echo($html) ;				
		
	} elseif($action=="create"){
		
		/* Formulaire creation d'un etudiant */
		$html=html_form_create() ;
		echo($html) ; 
	
	} elseif($action=="delete"){

		/* Supression d'un etudiant */	
		delete_paragrapheMenu($conn, $id) ;
	}
}


if(isset($_POST["action"]) && isset($_POST["id"])){
	$action=$_POST["action"];
	$id=$_POST["id"];

	$texte=$_POST["texte"] ; 
			
	if($action=="update"){
		/* traitement du formulaire d'ajout */
		update_paragrapheMenu($conn, $id, $texte); 	

	} elseif($action=="create"){
		/* traitement du formulaire de maj */
		insert_paragrapheMenu($conn, $texte); 
	}
}

?>

<!-- tableau de gestion des etudiants -->
<?php

$paragraphes=liste_paragrapheMenu($conn) ;
$html=html_table_paragraphe($paragraphes);
echo($html) ;

?>

<!-- lien d'ajout d'un etudiant -->
<a href="admin_texte.php?table=paragrapheMenu&action=create&id=_">Ajouter un paragraphe</a>

</body>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

</html>