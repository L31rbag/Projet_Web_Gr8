<?php
// include("../../../../db/db_connect.php");
include("../db/db_connect.php");
// include("../../model/menu_crud.php");
include("./src/model/menu_crud.php");
// include("../fonction/menu_vue.php");
include("./src/view/fonction/menu_vue.php");
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
  <!-- <link rel="stylesheet" href="../../../css/style_menu.css"> -->
  <link rel="stylesheet" href="./css/style_menu.css">
</head>

<header>
	<div id=lien_header> 
    	<a href="index.php?page=texte">Texte</a>
    	<a href="index.php?page=resa">Reservation</a>
		<a id="here" href="index.php?page=menu">Menu</a>
		<a href="./src/view/page/admin_deco.php">Deconnexion</a>
	</div>
    <h1>Admin</h1>
    <!-- <img class="img_logo" src="../../../img/Ziravene_logo.jpg"/> -->
	 <img class="img_logo" src="./img/Ziravene_logo.jpg"/>
</header>

<body>

<div id="Menu">

<h2>Menu</h2>
<?php


/**
 * Controlleur : Traite les actions provenant des requetes POST et GET
 */
if(isset($_GET["action"]) && isset($_GET["id"])){

	$action=$_GET["action"];
	$id=$_GET["id"];

	if($action=="update"){
		
		/* Formulaire de maj d'un menu */
		$menu=select_menu($conn, $id) ;
		$html=html_form_maj($menu) ;
		echo($html) ;				
		
	} elseif($action=="create"){
		
		/* Formulaire creation d'un menu */
		$html=html_form_create() ;
		echo($html) ; 
	
	} elseif($action=="delete"){

		/* Supression d'un menu */	
		delete_menu($conn, $id) ;
	}
}


if(isset($_POST["action"]) && isset($_POST["id"])){
	$action=$_POST["action"];
    $id=$_POST["id"];
    $nom=$_POST["nom"];
    $descr=$_POST["description"];
    $prix=$_POST["prix"];
    $type=$_POST["type"];
			
	if($action=="update"){
		/* traitement du formulaire d'ajout */
		update_menu($conn, $id, $nom, $descr,$prix,$type); 	

	}
	elseif($action=="create"){
		insert_menu($conn, $nom,$descr,$prix,$type); 
		header("Location: index.php?page=menu");
	/* traitement du formulaire de maj */}
	
}

?>

<!-- ta-->
<?php

$menus=liste_menu($conn) ;
$html=html_table_menu($menus);
echo($html) ;

?>

<!-- lien d'ajout d'un menu -->
<a id="ajout_menu" href="index.php?page=menu&table=menu&action=create&id=_">Ajouter un plat au menu</a>

<p>*Pour les types : 1 = entrée, 2 = plat, 3 = dessert</p>

</div>

</body>

<!-- <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> -->

</html>