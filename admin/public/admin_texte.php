<?php
include("../../db/db_connect.php");
include("../src/crud/paragrapheMenu_crud.php");

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



</body>


<script src="" defer></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

</html>