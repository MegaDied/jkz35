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
				<h2>Information Setup</h2>
				<?php
					require("../functions/dbconnect.php");
					
					$mail = mysqli_real_escape_string($connection, $_POST['mail']);
					$link = mysqli_real_escape_string($connection, $_POST['link']);
					$title = mysqli_real_escape_string($connection, $_POST['title']);
					
					$query = "INSERT INTO info (id, email, website, title) VALUES(1, '$mail', '$link', '$title')";
					$sql = mysqli_query($connection, $query);
					
				?>
				<div class="alert alert-success" role="alert">
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					Your website is ready now! Please press next.
				</div>
				<a href="setup8.php">Next >></a>
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
