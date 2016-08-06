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
				<p>If there were no errors and everything went fine, you are able to create an account for yourself now. You can almost use the software on your website.</p>
				<form method="POST" action="setup5.php" name="signup">
					
						<div class="form-group">
							<label for="UsernameRegisterInput">Username:</label>
							<input class="form-control" placeholder="Username" type="text" name="username" />
						</div>
				
						<div class="form-group">
							<label for="EmailRegisterInput">E-mail (max 30 characters):</label>
							<input type="email" class="form-control" name="mail" placeholder="E-Mail"/>
							<p>This is also the mail used to send verification mails. So think twice about which email to use.</p>
						</div>

						<div class="forum-group">
							<label for="PasswordRegisterInput">Password:</label>
							<input type="password" class="form-control" name="password" placeholder="Password"/>
						</div>
				
						<div class="form-group">
							<label for="RepeatPasswordRegisterInput">Repeat Password:</label>
							<input type="password" class="form-control" name="repassword" placeholder="Password"/>
						</div>
						<br />
						
						<p>Please check your entries again, since the website will be broken if wrong information has been given.</p>
						<button name="submit" type="submit" class="btn btn-primary">Next >></button>
					
				</form>
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
