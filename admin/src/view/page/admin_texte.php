<?php

include("../db/db_connect.php");
include("./src/model/paragrapheMenu_crud.php");
include("./src/view/fonction/paragrapheMenu_vue.php");

session_start();
if(!$_SESSION["admin"]){
    header("Location: index.php");
  }

?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Le Ziravène - Admin</title>
  <link rel="stylesheet" href="./css/style_menu.css">
</head>

<header>
	<div id=lien_header>
	<a id="here" href="index.php?page=texte">Texte</a>
    <a href="index.php?page=resa">Reservation</a>
	<a href="index.php?page=menu">Menu</a>
	<a href="./src/view/page/admin_deco.php">Deconnexion</a>
</div>
    <h1>Admin</h1>
    <img class="img_logo" src="./img/Ziravene_logo.jpg"/>
</header>

<body>

<div id="Menu">
<h2>Paragraphe</h2>
<?php


/**
 * Controlleur : Traite les actions provenant des requetes POST et GET
 */
if(isset($_GET["action"]) && isset($_GET["id"])){

	$action=$_GET["action"];
	$id=$_GET["id"];

	if($action=="update"){
		
		/* Formulaire de maj d'un paragraphe */
		$paragraphe=select_paragrapheMenu($conn, $id) ;
		$html=html_form_maj($paragraphe) ;
		echo($html) ;				
		
	} elseif($action=="create"){
		
		/* Formulaire creation d'un paragraphe */
		$html=html_form_create() ;
		echo($html) ; 
	
	} elseif($action=="delete"){

		/* Supression d'un paragraphe */	
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


	}
	elseif($action=="create"){
		insert_paragrapheMenu($conn, $texte);
	/* traitement du formulaire de maj */}
	
}

?>

<!-- ta-->
<?php

$paragraphes=liste_paragrapheMenu($conn) ;
$html=html_table_paragraphe($paragraphes);
echo($html) ;

?>

<!-- <a href="admin_texte.php?table=paragrapheMenu&action=create&id=_">Ajouter un paragraphe</a> -->

</div>
</body>

</html>