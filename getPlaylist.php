<?php
$user=$_COOKIE['username'];
$connessione = mysqli_connect("localhost", "root", "", "hw1") or die("Errore: ".mysqli_connect_error());
	$queryRead="SELECT * FROM playlist WHERE username = '$user' " or die(mysql_error());
	$sql=mysqli_query($connessione,$queryRead); 
	if($sql) {
		$risultati= array();
		while ($row= mysqli_fetch_array($sql)){
			$risultati[]=$row;
		}
	}
echo json_encode($risultati);
mysqli_free_result($sql);
mysqli_close($connessione);
	?>