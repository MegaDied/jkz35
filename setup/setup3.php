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
				<h2>Tables setup</h2>
				<div class="alert alert-danger" role="alert">
					<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					<span class="sr-only">Error:</span>
					Wait a minute or so, so your database can process all the table creations. This step only works if the previous step was successfull and you didn't receive any errors.
				</div>
				<?php
					require("../functions/dbconnect.php");
					//Create all the tables
					//Create users table
					$usersquery = "--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `active` int(11) NOT NULL,
  `showmail` decimal(10,0) NOT NULL,
  `admin` int(11) NOT NULL,
  `lastactive` datetime NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";

					$userssql = mysqli_query($connection, $usersquery);
					
					//Create thread table
					$threadquery = "--
-- Table structure for table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `link` varchar(32) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` varchar(5000) NOT NULL,
  `section` varchar(30) DEFAULT '/r/random',
  `date` datetime NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
					
					$threadsql = mysqli_query($connection, $threadquery);
					
					//Create posts table
					$postsquery = "--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL,
  `posts` text NOT NULL,
  `admin` int(11) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";

					$postssql = mysqli_query($connection, $postsquery);
					
					//Create comments table
					$commentsquery = "--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `url` varchar(50) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
				
					$commentssql = mysqli_query($connection, $commentsquery);
					
					//Create info table
					$infoquery = "--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;";
					
					$infosql = mysqli_query($connection, $infoquery);
				?>
				
				<!-- Check if everything worked -->
				
				<?php
					//Users
					$testusers = mysqli_query($connection, 'select 1 from `users` LIMIT 1');

					if($testusers !== FALSE){
						echo '<div class="alert alert-success" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Table "users" has been created!
							</div>';
					} else{
						echo '<div class="alert alert-danger" role="alert">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Table "users" has not been created!!!
							</div>';
					}
					
					//Threads
					$testthread = mysqli_query($connection, 'select 1 from `thread` LIMIT 1');

					if($testthread !== FALSE){
						echo '<div class="alert alert-success" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Table "thread" has been created!
							</div>';
					} else{
						echo '<div class="alert alert-danger" role="alert">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Table "thread" has not been created!!!
							</div>';
					}
					
					//Posts
					$testpsots = mysqli_query($connection, 'select 1 from `posts` LIMIT 1');

					if($testposts !== FALSE){
						echo '<div class="alert alert-success" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Table "posts" has been created!
							</div>';
					} else{
						echo '<div class="alert alert-danger" role="alert">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Table "posts" has not been created!!!
							</div>';
					}
					
					//Comments
					$testcomments = mysqli_query($connection, 'select 1 from `comments` LIMIT 1');

					if($testcomments !== FALSE){
						echo '<div class="alert alert-success" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Table "comments" has been created!
							</div>';
					} else{
						echo '<div class="alert alert-danger" role="alert">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Table "comments" has not been created!!!
							</div>';
					}
					
					//Info
					$testinfo = mysqli_query($connection, 'select 1 from `info` LIMIT 1');

					if($testinfo !== FALSE){
						echo '<div class="alert alert-success" role="alert">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Table "info" has been created!
							</div>';
					} else{
						echo '<div class="alert alert-danger" role="alert">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<span class="sr-only">Error:</span>
							Table "info" has not been created!!!
							</div>';
					}
				?>
				<p>If all tables are created successfully, you can press next.</p>
				<p><a href="setup4.php">Next >></a></p>
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
