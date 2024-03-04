<?php
	$conn = new mysqli('localhost', 'root', '', 'studentinfo');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>