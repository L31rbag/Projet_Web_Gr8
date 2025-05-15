<?php
include("./db/db_connect.php");
include("./admin/src/model/admin_crud.php");

session_start();

if(isset($_POST["login"])){
    $liste=liste_admin($conn);
    for($i=0;$i<count($liste);$i++){
        if($_POST["login"]==$liste[$i]["name"] && $_POST["mdp"]==$liste[$i]["password"]){
            $_SESSION["admin"]=time();
            header("Location: index.php?page=menu");
            //include("admin/src/view/page/admin_menu.php");
        } 
    }
}


?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="./admin/css/log.css">
</head>

<body>
    <header>
        <h1>Le Ziravène</h1>
    </header>

    <form method="POST" action="index.php">
        <h1> Admin </h1>
        <div class="log_input">
            <p>Identifiant:</p>
            <input type="text" name="login" required /><br> <!-- newReservation -->
        </div>
        <div class="log_input">
            <p>Mot de passe:</p>
            <input type="password" name="mdp" required/><br>
        </div>
        <input id="log_button" type="submit" value="Connexion" />
    </form>

</body>

</html>