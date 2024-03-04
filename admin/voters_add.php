<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$studnum = $_POST['studnum'];
		$sql = "INSERT INTO vts (studnum) VALUES ('$studnum')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>