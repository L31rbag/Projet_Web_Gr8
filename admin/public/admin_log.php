<?php
include("../../db/db_connect.php");
include("../src/crud/admin_crud.php");

session_start();

if(isset($_POST["login"])){
    $liste=liste_admin($conn);
    for($i=0;$i<count($liste);$i++){
        if($_POST["login"]==$liste[$i]["name"] && $_POST["mdp"]==$liste[$i]["password"]){
            $_SESSION["admin"]=time();
            header("Location: Index.html");
        } 
    }
}


?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="../style/log.css">
</head>

<body>
    <header>
        <a id="title" href="../../customer/index.html"><h1>Le Ziravène</h1></a>
    </header>

    <form method="POST" action="admin_log.php">
        <h1> Admin </h1>
        <div class="log_input">
            <p>Identifiant:</p>
            <input type="text" name="login" required /><br> <!-- newReservation -->
        </div>
        <div class="log_input">
            <p>Mot de passe:</p>
            <input type="text" name="mdp" required/><br>
        </div>
        <input id="log_button" type="submit" />
    </form>

</body>

</html>