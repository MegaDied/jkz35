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
				<form method="POST" action="setup7.php" name="info">
					
						<div class="form-group">
							<label for="AdminMail">Admin Mail:</label>
							<input class="form-control" placeholder="E.g. noreply@jkz35.xyz" type="email" name="mail" />
						</div>
				
						<div class="form-group">
							<label for="Title">Website title:</label>
							<input type="text" class="form-control" name="title" placeholder="E.g. jkz35"/>
							<p>It is recommended to use a short title and to start with a capital letter.</p>
						</div>

						<div class="forum-group">
							<label for="Site">Website link:</label>
							<input type="text" class="form-control" name="link" placeholder="E.g. jkz35.xyz"/>
							<p>Do not put a slash at the end. Slashes will automatically be added when necessary. Example of a wrong link: http://www.jkz35.xyz/</p>
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
