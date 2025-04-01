<?php
include_once("../../db/db_connect.php");


if(isset($_POST["nom"])
&& isset($_POST["telephone"])
&& isset($_POST["email"])
&& isset($_POST["nbPersonne"])
&& isset($_POST["date"])
&& isset($_POST["service"])
&& isset($_POST["message"])
){
$nom = $_POST["nom"];
$tel = $_POST["telephone"];
$mail = $_POST["email"];
$nbp = $_POST["nbPersonne"];
$date = $_POST["date"];
$serv = $_POST["service"];
$mess = $_POST["message"];

$sql = "INSERT INTO reservation (`nom`, `telephone`, `email`, `nbPersonne`, `date`, `service`, `message`) 
VALUES ('$nom', '$tel', '$mail', '$nbp', '$date', '$serv', '$mess')";
if (mysqli_query($conn, $sql)) {
      echo "Nouveau enregistrement créé avec succès";
} else {
      echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
header("Location: ../index.html");

?>
