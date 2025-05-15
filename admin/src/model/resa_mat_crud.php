<?php
include('../../../../db/db_connect.php');

function liste_reservation($conn){
	$sql="SELECT * FROM `reservation`"; 
	 
	$res=mysqli_query($conn, $sql) ; 
	return rs_to_tab($res) ;
}

function rs_to_tab($rs){
	$tab=[] ; 
	while($row=mysqli_fetch_assoc($rs)){
		$tab[]=$row ;	
	}
	return $tab;
}

echo json_encode(liste_reservation($conn)); 
?>