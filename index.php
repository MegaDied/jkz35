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
	
	<title><?php echo $sitetitle; ?> - Index</title>

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
                <h1 class="page-header">Index
                    <small>You have entered the community</small>
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
				<?php
					//Bericht verzenden.
					/*require('functions/dbconnect.php');

					$latestid="SELECT id FROM posts ORDER BY id DESC LIMIT 25";
					$post = mysqli_real_escape_string($connection, $_POST['post']);
					$number = 1;
					$newid=mysqli_insert_id($connection)+$number;
					$admincheck=mysqli_query($connection,"SELECT * FROM users WHERE username='$user'");
					while($adminrow = $admincheck->fetch_assoc()){
						if($adminrow['admin'] == "1"){
							$adminpost = 1;
						}
					}

					if (isset($_POST['submit'])){
						if ("" == trim($_POST['post'])) {
							echo "<h2>Please post something that is not useless....</h2>";
							header( "refresh:2;url=index.php" );
						} elseif (strlen($post) < 4) {
							echo "<h2>That message is very short. 4+ character please.</h2>";
							header( "refresh:2;url=index.php" );
						} elseif (isset($_POST['post'])) {
							$sql=mysqli_query($connection,"INSERT INTO posts (id, user, post, admin) VALUES (id, '$user', '$post', '$adminpost')");
							echo "<h2>Your message has been added</h2>";
							header( "url=index.php" );
						}
					}

					mysqli_close($connection);
				?>
				<!-- End of PHP script -->
				<form method="POST" action="index.php" name="postform">
					<div class="form-group">
					<label for="MessageInput">Message:</label>
						<div class="row">
							<div class="col-lg-10">
								<input class="form-control" placeholder="Your Message" type="text" name="post" />
							</div>
							<div class="col-lg-2">
								<button class="btn btn-default" type="submit" name="submit">Send</button>
							</div>
						</div>
					</div>
				</form>
				<br />
				<a href="chatbox.php">Full chatbox</a>
				<br />
				<?php
					require('dbconnect.php');

					$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 15";
					$result = mysqli_query($connection, $sql);

					if ($result->num_rows > 0) {
						//Data van elke rij neerzetten.
						//Eerst check of er iemand admin is.
						while($row = $result->fetch_assoc()) {
							if($admin == 1){
								if($row["admin"] == 1){
									echo "<a href='removechat.php?chatid=" . $row["id"] . "'>[X]</a> [<font color='red'>" . htmlentities($row["user"]) . "</font>] " . htmlentities($row["post"]) .  "<br>";
								} else {
									echo "<a href='removechat.php?chatid=" . $row["id"] . "'>[X]</a> [" . htmlentities($row["user"]) . "] " . htmlentities($row["post"]) .  "<br>";
								}
							} else {
								if($row["admin"] == 1){
									echo "[<font color='red'>" . htmlentities($row["user"]) . "</font>] " . htmlentities($row["post"]) .  "<br>";
								} else {
									echo "[" . htmlentities($row["user"]) . "] " . htmlentities($row["post"]) .  "<br>";
								}
							}
						}
					} else {
						echo "No results. Propably an error in the database. Contact the administrator please. ";
					}
					*/
				?>
				<hr>
				</div>
				<!-- All the threads -->
				<?php
					require('functions/dbconnect.php');

					$getthreads=mysqli_query($connection, "SELECT * FROM thread ORDER BY id DESC LIMIT 50");
					if ($getthreads->num_rows > 0) {
						//Data van elke rij neerzetten.
						echo "<div class='table-responsive'>
							<table class='table'>
							<thead>
							<tr>
							<th>Title</th>
							<th>Section</th>
							<th>Date</th>
							</tr>
							</thead>
							<tbody>
							";
						while($threadrow = $getthreads->fetch_assoc()) {

							echo "<tr><td><a href='viewpost.php?link=" . $threadrow['link'] . "'>" . htmlentities($threadrow['title']) . "</a></td>
							<td><a href=sections.php?section=" . htmlentities($threadrow['section']) . ">" . htmlentities($threadrow['section']) . "</a></td> <td>" . htmlentities($threadrow['date']) . "</td></tr>";

						}
						echo " </tbody> </table> </div>";
					} else {
						echo "No threads found. Propably an error in the database. Contact the administrator please. ";
					}
				?>
				<?php
					require('functions/dbconnect.php');

					$currenttime = date("Y-m-d h:i:sa");
					$unix = strtotime($currenttime);
					$fivemins = $unix - 300;
					$sql = mysqli_query($connection, "SELECT username,lastactive FROM users");

					if ($sql->num_rows > 0) {
						echo "Online users: ";
						while($online = $sql->fetch_assoc()) {
							$lastactive = $online['lastactive'];
							$time = strtotime($lastactive);
							if ($time > $fivemins) {
								echo $online['username'] . ", ";
							}
						}
					} else {
						echo "An unexpected error has occured.";
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
