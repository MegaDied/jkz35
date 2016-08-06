<?php
	include('functions/restricted.php');
	include('functions/get_site_info.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

	
	

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Jkz35.xyz - Home" content="Do you want to have fun and just chat with other people? Just take a look over here. We offer a fun chat system and you can make yor own posts to share anything you like!">
    <meta name="author" content="">

    <title><?php echo $sitetitle; ?> - Userlist</title>

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
                        <a href="makepost.php"><span class="glyphicon glyphicon-share" aria-hidden="true"></span> Post</a>
                    </li>
					<li>
                        <a href="settings.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Profile Settings</a>
                    </li>
					<li>
                        <a href="userlist.php"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Userlist</a>
                    </li>
					<li>
                        <a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a>
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
                <h1 class="page-header">Userlist
                    <small>All the awesome users</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
				<div id="chat">
				<!-- PHP Script for sending a message -->
				<h3>Only activated users will be shown!</h3>
				<?php
					require('dbconnect.php');
					
					
	
					$sql = mysqli_query($connection, "SELECT id,username,email,showmail,active FROM users WHERE active=1");
	
					if ($sql->num_rows > 0) {
						//Data van elke rij neerzetten.
						echo "<div class='table-responsive'>
							<table class='table'>
							<thead>
							<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Email</th>
							</tr>
							</thead>
							<tbody>
							";
						while($users = $sql->fetch_assoc()) {
							if($users['showmail'] == 1){
								echo "<tr><td>" . $users['id'] . "</td>
								<td>" . htmlentities($users['username']) . "</td>
								<td>" . htmlentities($users['email']) . "</td></tr>";
							} else if ($users['showmail'] == 0) {
								echo "<tr><td>" . $users['id'] . "</td>
								<td>" . htmlentities($users['username']) . "</td>
								<td>Private</td></tr>";
							}
						}
						echo " </tbody> </table> </div>";
					} else {
						echo "No users found. This is an error. Please contact the administrator.";
					}

					mysqli_close($connection);
				?>
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
