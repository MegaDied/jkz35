<?php

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

	<title><?php echo $sitetitle; ?> - Read Post</title>

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
                <a class="navbar-brand" href="index.php"><?php echo $sitetitle; ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<?php
						if(empty($user)){
							echo '<li>
                        <a href="../login.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login</a>
                    </li>
                    <li>
                        <a href="../signup.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Register</a>
                    </li>';
						}
					?>

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
                <h1 class="page-header">Post
                    <small>You are currently viewing a post</small>
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
				<!-- Main Page to post stuff -->
				<?php
					require('../functions/dbconnect.php');
					$link = htmlentities($_GET['link']);
					$getthread=mysqli_query($connection, "SELECT * FROM thread WHERE link = '$link'");
					if ($getthread->num_rows > 0) {
						//Data van elke rij neerzetten.
						while($threaddata = $getthread->fetch_assoc()) {
							echo "<h3>" . htmlentities($threaddata['title']) . "<small>    " . $threaddata['date'] . "</small></h3><br>";
							echo "<p>" . nl2br(htmlentities($threaddata['message'])) . "</p>";
							echo "<p>" . htmlentities($threaddata['username']) . " - " . $threaddata['link'] . "</p>";
						}
					} else {
						echo "Sorry, but this thread does not exist. <a href='index.php'>Click here to go to the main menu</a>";
					}
				?>
				<hr>
            </div>
        </div>
		<div class="row">
			<div class="col-md-11 col-md-offset-1">
				<div id="react">
				<!-- Post Comment -->
				<h3>Comments</h3>
				<?php
					require('../functions/dbconnect.php');
					if(isset($user)){
						$user = mysqli_real_escape_string($connection, $_SESSION['username']);
						$comment = mysqli_real_escape_string($connection, $_POST['comment']);
						if(isset($_POST['submit']) AND isset($_POST['comment']) && !empty($_POST['comment'])){
							$sql=mysqli_query($connection, "INSERT INTO comments (id, username, comment, date, url) VALUES (id, '$user', '$comment', now(), '$link')") or die ('Error while posting comment!');
							echo "Your comment has been posted. The page will reload in 2 seconds.";
							header("refresh:2;");
						}
						echo '<!-- Comment form -->
					<form method="POST" action="../viewpost.php?link=' . $link . '" name="postcomment">

						<div class="form-group">
							<label for="InputMessage">Your comment</label>
							<textarea class="form-control" placeholder="Your comment here" type="text" name="comment" rows="3"></textarea>
						</div>

						<button type="submit" name="submit" class="btn btn-primary">Comment</button>
					</form>
				</div>';
					}

				?>
				<?php
					require('../functions/dbconnect.php');
					$getcomments = mysqli_query($connection, "SELECT * FROM comments WHERE url = '$link' ORDER BY id DESC");
					echo "<br>";
					if ($getcomments->num_rows > 0) {
						//Data van elke rij neerzetten.
						while($commentdata = $getcomments->fetch_assoc()) {
								echo "<h4>" . htmlentities($commentdata['username']) . "<small>    " . $commentdata['date'] . "</small></h4><br>";
								echo "<p> " . nl2br(htmlentities($commentdata['comment'])) . "</p>";
								echo "<p><small> Comment id: " . htmlentities($commentdata['id']) . "</small></p>";
								echo "<hr>";
							}
					} if(isset($user)) {
						echo "No comments found. Be the first one to comment!";
					} else {
						echo "No comments found. <a href='../login.php'>Login</a> or <a href='../signup.php'>register</a> to comment!";
					}
				?>
				<br>
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
