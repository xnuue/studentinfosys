<?php
session_start();
unset($_SESSION['success']);

if(isset($_SESSION['admin'])){
    header('location: admin/home.php');
    exit(); // Ensure script stops execution after redirection
}

if(isset($_SESSION['voter'])){
    header('location: home.php');
    exit(); // Ensure script stops execution after redirection
}

include 'includes/header.php';
?>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Taguig City University </b>Student Information System
        </div>
    
        <div class="login-box-body">
            <p class="login-box-msg">Enter your details here.</p>
        <form action="login.php" method="POST">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="studnum" placeholder="Student Number" required>
                <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="name" placeholder="Name" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="address" placeholder="Address" required>
                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="contact_number" placeholder="Contact Number" required>
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="age" placeholder="Age" required>
                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="course" placeholder="Course" required>
                <span class="glyphicon glyphicon-book form-control-feedback"></span>
            </div>
          
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Save Info</button>
                </div>
            </div>
            </form>
        </div>

        <?php
        if(isset($_SESSION['error'])){
            echo "
                <div class='callout callout-danger text-center mt20'>
                    <p>".$_SESSION['error']."</p> 
                </div>
            ";
            unset($_SESSION['error']);
        }elseif(isset($_SESSION['success'])){ // Check if session success is set
            echo "
                <div class='callout callout-success text-center mt20'>
                    <p>".$_SESSION['success']."</p> 
                </div>
            ";
            unset($_SESSION['success']);
        }
        ?>
    </div>
    <?php include 'includes/scripts.php' ?>
</body>
</html>