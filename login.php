<?php
	include('functions/get_site_info.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $sitetitle; ?> - Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php echo $sitetitle; ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="login.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login</a>
                    </li>
                    <li>
                        <a href="signup.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Register</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Login
                    <small>Enter the community via this gate</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Login</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
			<?php 
				session_start();
				require('dbconnect.php');

				if(!empty($_POST['username']) && !empty($_POST['password']))
				{
					$username    = mysqli_real_escape_string($connection, $_POST['username']);
					$password    = hash('sha256', $_POST['password']); 
		
					//Test username
					$sql = mysqli_query($connection, "SELECT * FROM `users` WHERE `username`='$username'");
					if(mysqli_num_rows($sql) == 1) {
						//Test password
						$sql = mysqli_query($connection, "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'");
						if(mysqli_num_rows($sql) == 1) {
							//Test for active account
							$sql = mysqli_query($connection, "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password' AND `active`='1'");
							if(mysqli_num_rows($sql) == 1) {
								$_SESSION['username'] = $username;
								header("location:index.php");
							} else {
								echo '<div class="alert alert-danger" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only">Error:</span>
									Account is not yet activated. Please read our e-mail and look in your spam folder. If there is nothing there, be patient. There are huge server load times with sending activation e-mails.
									</div>';
							}
						} else {
							echo '<div class="alert alert-danger" role="alert">
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								<span class="sr-only">Error:</span>
								Wrong password!
								</div>';
						}
					} else {
						echo '<div class="alert alert-danger" role="alert">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Wrong password!
							</div>';
					}
				}
			?>
			<form method="POST" action="login.php" name="login">
				<table>
					<div class="form-group">
						<label for="InputUsername">Username</label>
						<input class="form-control" placeholder="Username" type="username" name="username" />
					</div>

					<div class="form-group">
						<label for="InputPassword">Password</label>
						<input class="form-control" placeholder="Password" type="password" name="password" />
					</div>
				
					<button type="submit" name="submit" class="btn btn-primary">Login</button>
				</table>
			</form> 
			<br />
			<br />
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
