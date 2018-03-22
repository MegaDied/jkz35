<!DOCTYPE html>
<html lang="en">

<head>
    <title>jkz35 - Setup</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Setup
					<small>Installation of jkz35 software</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
			<div class="col-lg-12">
				<!-- Setup -->
				<h2>Admin Setup</h2>
				<?php
	require('../functions/dbconnect.php');
	
	
    if(isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['mail']) && !empty($_POST['mail']) AND isset($_POST['password']) && !empty($_POST['password']) AND isset($_POST['repassword']) && !empty($_POST['repassword'])){
        // Form Submited, test everything.
		$username=mysqli_real_escape_string($connection, $_POST['username']);
		$mail=mysqli_real_escape_string($connection, $_POST['mail']);
		$password=hash('sha256', $_POST['password']); 
		$repassword=hash('sha256', $_POST['repassword']);
		
		//Test passwords
		if($password = $repassword) {
			//Test for existing username
			$sql = mysqli_query($connection, "SELECT * FROM `users` WHERE `username`='$username'");
			if(mysqli_num_rows($sql) == 1) {
				echo "<font color='red'>Something went wrong! This error means that this user already exists, but there are no users yet.</font>";
			} else {
				//Test for existing email
				$sql = mysqli_query($connection, "SELECT * FROM `users` WHERE `email`='$mail'");
				if(mysqli_num_rows($sql) == 1) {
					echo "<font color='red'>Something went wrong! This error means that this email already exists, but there are no users yet.</font>";
				} else {
					//Make user :D
				$hash = md5( rand(0,1000) );
			mysqli_query($connection, "INSERT INTO users (username, password, email, hash, admin, active) VALUES(
				'". $username ."', 
				'". $password ."', 
				'". $mail ."', 
				'". $hash ."', 1, 1) ");
			
			echo '<div class="alert alert-success" role="alert">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>First user has been made! You are now an admin!
					</div>';
					
				}
			}
		} else {
			echo '<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>Your passwords are not the same! Please press the back button and try again. (It is safe to press back, but only in this situation)
					</div>';
		}
    } else {
		echo '<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>An unexpected error has occured! The problem might be that you did not fill everything in. Please try again.
					</div>';
	}
             
?>
				<p>If everything went right, and it says that your user has been made, you can press next. Only one small step is left. If you want to create multiple admins, you'll have to wait for a new update.</p>
				<a href="setup6.php">Next >></a>
			</div>
		</div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Jkz35 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	
	
</body>

</html>
