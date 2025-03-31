<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$servername = "51.68.91.213";
$username = "info8";
$password = "0eX";
$dbname = "info8";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["error" => "Connexion échouée: " . $conn->connect_error]);
    exit();
}

$sql = "SELECT texte FROM paragrapheMenu WHERE id = 1";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["error" => "Aucun texte trouvé"]);
}

$conn->close();
?>
