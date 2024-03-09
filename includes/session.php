<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['voter'])){
		$sql = "SELECT * FROM vts WHERE id = '".$_SESSION['vts']."'";
		$query = $conn->query($sql);
		$voter = $query->fetch_assoc();
	}
	else{
		header('location: index.php');
		exit();
	}

?>