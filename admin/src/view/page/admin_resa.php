<?php
// include("../../../../db/db_connect.php");
// include("../../model/resa_crud.php");
// include("../fonction/resa_vue.php");

include("db/db_connect.php");
include("admin/src/model/resa_crud.php");
include("admin/src/view/fonction/resa_vue.php");

session_start();
if(!$_SESSION["admin"]){
    header("Location: index.php");
  }

if (isset($_GET["date"])){
	$jour = $_GET["date"];
}
else{
    $jour = date("Y-m-j");
}
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <link rel="stylesheet" href="admin/css/style_resa.css">
</head>

<header>
	  <div id=lien_header>
      <a href="./index.php?page=texte">Texte</a>
		  <a href="./index.php?page=menu">Menu</a>
      <a href="./admin/src/view/page/admin_deco.php">Deconnexion</a>
	  </div>
    <h1>Admin</h1>
    <img class="img_logo" src="admin/img/Ziravene_logo.jpg"/>
</header>

<body>

<div id="restaurant">

</div>


<div id="barre">

</div>


<div id="table_res">



<h2>Reservation</h2>

<?php

$html= "<form id='date' action='index.php' method='GET'>";
$html.= "<label for='date'>Date actuel : </label>";
$html.= "<input type='date' name='date' value='$jour'>";
$html.="<input type='hidden' name='page' value='resa'>\n" ; 
$html.="<input type='submit' value='Changer date'>";
$html.= "</form>";
echo ($html);


/**
 * Controlleur : Traite les actions provenant des requetes POST et GET
 */
if(isset($_GET["action"]) && isset($_GET["id"])){

	$action=$_GET["action"];
	$id=$_GET["id"];

	if($action=="update"){
		
		/* Formulaire de maj d'une resa */
		$resa=select_resa($conn, $id) ;
		$html=html_form_maj($resa) ;
		echo($html) ;				
		
	} elseif($action=="create"){
		
		/* Formulaire creation d'une resa */
		$html=html_form_create() ;
		echo($html) ; 
	
	} elseif($action=="delete"){

		/* Supression d'une resa */	
		delete_resa($conn, $id) ;
	}
}


if(isset($_POST["action"]) && isset($_POST["id"])){
	$action=$_POST["action"];
    $id=$_POST["id"];
    $nom=$_POST["nom"];
    $tel=$_POST["telephone"];
    $mail=$_POST["email"];
    $nb=$_POST["nbPersonne"];
    $date=$_POST["date"];
    $serv=$_POST["service"];
    $mess=$_POST["message"];
			
	if($action=="update"){
		/* traitement du formulaire d'update */
		update_resa($conn, $id, $nom, $tel, $mail, $nb, $date, $serv, $mess); 	

	}
	elseif($action=="create"){
		insert_resa($conn, $nom, $tel, $mail, $nb, $date, $serv, $mess); 
		header("Location: index.php?page=resa");
	/* traitement du formulaire d'ajout */}
	
}

?>

<!-- ta-->
<?php

$resas=liste_resa($conn,$jour) ;
$html=html_table_resa($resas);
echo($html) ;

?>

<!-- lien d'ajout d'une resa -->
<a id="ajout_resa" href="index.php?page=resa&table=resa&action=create&id=_">Ajouter une reservation</a>

</div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="./admin/js/matrice_resa.js" defer></script>
</body>
</html>