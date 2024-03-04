<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$studnum = $_POST['studnum'];

		$sql = "SELECT * FROM vts WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();


		$sql = "UPDATE vts SET studnum = '$studnum' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: voters.php');

?>