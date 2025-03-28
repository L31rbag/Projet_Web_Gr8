<?php

$conn = mysqli_connect("localhost","info8","0eX","info8");
if(!$conn){
    echo("something wrong!!!") ; 
}


mysqli_set_charset($conn, "utf8");
?>