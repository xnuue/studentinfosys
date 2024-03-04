<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$studnum = $_POST['studnum'];

		$sql = "SELECT * FROM vts WHERE studnum = '$studnum'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find voter with the provided Student Number!';
		}
		else{
			$row = $query->fetch_assoc();
			$_SESSION['voter'] = $row['id'];
		}
	}
	else{
		$_SESSION['error'] = 'Input voter credentials first';
	}

	header('location: index.php');
?>
