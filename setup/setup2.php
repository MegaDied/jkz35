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
				<?php
					//Define variables
					$server = $_POST['server'];
					$username = $_POST['username'];
					$password = $_POST['password'];
					$database = $_POST['database'];
					
					$dbconnect2 = fopen("../functions/dbconnect.php", "w") or die('<div class="alert alert-danger" role="alert">
									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
									<span class="sr-only">Error:</span>
									Could not open the database file! Please contact jkz35.
									</div>');
									
					$txt = '<?php
	$sqlserver = "' . $server . '";    #Mysql Server
	$sqluser = "' . $username . '";        #Mysql Username
	$sqlpass = "' . $password . '";        #Mysql Password

	$sqldb = "' . $database . '";                #CMS database

	$connection = mysqli_connect($sqlserver, $sqluser, $sqlpass, $sqldb) or die ("Can not connect to the Database. Please try again later." . mysql_error());
?>';
					fwrite($dbconnect2, $txt);
					fclose($dbconnect2);
					
					
				?>
				
				<div class="alert alert-success" role="alert">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					If you didn't receive any red error messages, please wait a few seconds so the server can process your request. After that, you are safe to click next.
				</div>
				<p><a href="setup3.php">Next >></a></p>
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
