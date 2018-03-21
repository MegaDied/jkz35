<?php
	#THIS IS A CUSTOM SESSION CHECK. DON'T CHANGE!!!
	session_start();
	require('../functions/dbconnect.php');
	
	$user = $_SESSION['username'];
	if(empty($_SESSION['username']))
	{
		header("location:../guests/index.php");
	} else {
		// Register last activity into database
		$activityquery = "UPDATE users SET lastactive=now() WHERE username = '$user'";
		$activitysql = mysqli_query($connection, $activityquery);
		// Admin query
		$admincheck=mysqli_query($connection,"SELECT username,admin FROM users WHERE username='$user'");
		while($adminrow = $admincheck->fetch_assoc()){
			if($adminrow['admin'] == "1"){
				$admin = 1;
			}
		}
	}
	
	mysqli_close($connection);
	
	include('../functions/get_site_info.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $sitetitle; ?> - Privacy Settings</title>

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
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><?php echo $sitetitle; ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li>
                        <a href="../makepost.php"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> Post</a>
                    </li>
					<li>
                        <a href="../settings.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Profile Settings</a>
                    </li>
					<li>
                        <a href="../userlist.php"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Userlist</a>
                    </li>
					<li>
                        <a href="../logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a>
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
                <h1 class="page-header">Profile Settings
                    <small>Mind your privacy!</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a>
                    </li>
                    <li class="active">Profile Settings</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Sidebar Column -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="../settings.php" class="list-group-item">Global Settings</a>
					<a href="privacy.php" class="list-group-item active">Privacy Settings</a>
                </div>
            </div>
            <!-- Content Column -->
            <div class="col-md-9">
                <h2>Privacy Settings</h2>
                <p>Only change a setting when you are 100% sure.</p>
				<?php
					require('../functions/dbconnect.php');
					if(isset($_POST['submit'])){
						if(isset($_POST['mailcheck'])){
							mysqli_query($connection, "UPDATE users SET showmail='0' WHERE username='$user'");
							echo "Your mail is now invisible to the public.";
							header( "refresh:2;url=privacy.php" );
						} else {
							mysqli_query($connection, "UPDATE users SET showmail='1' WHERE username='$user'");
							echo "Your mail is now visible to the public.";
							header( "refresh:2;url=privacy.php" );
						}
					}
					
					$sql=mysqli_query($connection,"SELECT * FROM users WHERE username = '$user'");
					while($row = $sql->fetch_assoc()){
						if($row['showmail'] == 0){
							$showmail=0;
						} else {
							$showmail=1;
						}
					}
				?>
				<form method="POST" action="privacy.php" name="privacychange">
					<div class="checkbox">
						<label>
							<?php
								if($showmail == 0){
									$checked = 'checked="checked"';
								}
								echo '<input type="checkbox" name="mailcheck" '.$checked.' /> Make My E-Mail <i>invisible</i> to others.';
							?>
						</label>
					</div>
					
					<button name="submit" type="submit" class="btn btn-primary">Change Settings</button>
					
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
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
