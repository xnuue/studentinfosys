<?php
session_start();
include 'includes/conn.php';

if(isset($_POST['login'])){
    $studnum = mysqli_real_escape_string($conn, $_POST['studnum']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    $sql = "INSERT INTO vts (studnum, name, address, contact_number, age, course) 
            VALUES ('$studnum', '$name', '$address', '$contact_number', '$age', '$course')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Student information saved successfully!";
        header('location: index.php');
    } else {
        $_SESSION['error'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
        header('location: index.php');
    }
}
else{
    $_SESSION['error'] = 'Please provide student information.';
    header('location: index.php');
}

mysqli_close($conn); 
?>
