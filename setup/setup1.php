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
				<h2>Database setup</h2>
				<p><font color="red">Warning!</font> You have to start all over again if you fill in the wrong information!</p>
				<p>Additional info: You need to create your own database and give it a name. I can't create a database for you.
				<form method="POST" action="setup2.php" name="setup">
					
						<div class="form-group">
							<label for="UsernameRegisterInput">MySQL Server:</label>
							<input class="form-control" placeholder="localhost" type="text" name="server" />
						</div>
				
						<div class="form-group">
							<label for="EmailRegisterInput">MySQL Username</label>
							<input type="text" class="form-control" name="username" placeholder="root"/>
						</div>

						<div class="forum-group">
							<label for="PasswordRegisterInput">MySQL Password</label>
							<input type="password" class="form-control" name="password" placeholder="P@$$w0rd"/>
						</div>
				
						<div class="form-group">
							<label for="RepeatPasswordRegisterInput">MySQL Database</label>
							<input type="text" class="form-control" name="database" placeholder="jkz35_db"/>
						</div>
						
						<p>Click next to go to the next page and save the settings</p>
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
