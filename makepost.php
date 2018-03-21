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
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $sitetitle; ?> - Create a Post</title>

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
                <h1 class="page-header">Create
                    <small>Make a post</small>
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
					require('functions/dbconnect.php');
					if(isset($_POST['submit']) AND isset($_POST['title']) && !empty($_POST['title']) AND isset($_POST['message']) && !empty($_POST['message']) AND isset($_POST['section'])){
						$number = rand(0,1000);
						$link = md5($number);
						$getlinks = mysqli_query($connection, "SELECT link FROM thread WHERE link = '$link'");
						if(mysqli_num_rows($getlinks) == 1){
							header("refresh:1;url=makepost.php");
						}
						$username = mysqli_real_escape_string($connection, $user);
						$title = mysqli_real_escape_string($connection, $_POST['title']);
						$message = mysqli_real_escape_string($connection, $_POST['message']);
						$section = mysqli_real_escape_string($connection, $_POST['section']);
						
						$sql=mysqli_query($connection, "INSERT INTO thread (id, username, link, title, message, section, date) VALUES (id, '$username', '$link', '$title', '$message', '$section', now())") or die ('Error');
						echo "Thread has been posted! You will be redirected to home in a few seconds.";
						header("refresh:2;url=index.php");
					}
				?>
				<form method="POST" action="makepost.php" name="postmessage">
					<table>
						<div class="form-group">
							<label for="InputTitle">Title</label>
							<input class="form-control" placeholder="Title of your post" type="text" name="title" />
						</div>

						<div class="form-group">
							<label for="InputMessage">Content</label>
							<textarea class="form-control" placeholder="Content of your post" type="text" name="message" rows="3"></textarea>
						</div>
						
						<div class="form-group">
							<label for="InputTitle">Section (Select one)</label>
							<br>
							<label class="radio-inline">
								<input type="radio" name="section" id="random" value="/r/random"> /r/random
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="gaming" value="/r/gaming"> /r/gaming
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/news"> /r/news
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/cats"> /r/cats
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/funny"> /r/funny
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/gif"> /r/gif
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/minecraft"> /r/minecraft
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/video"> /r/video
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/;eagueoflegends"> /r/leagueoflegends
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/greatbritain"> /r/greatbritain
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/reports"> /r/reports
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/hospitality"> /r/hospitality
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/politics"> /r/politics
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/shopping"> /r/shopping
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/askjkz35"> /r/askjkz35
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/sports"> /r/sports
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/movies"> /r/movies
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/showerthoughts"> /r/showerthoughts
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/education"> /r/education
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/volunteerism"> /r/volunteerism
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/religion"> /r/religion
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/technology"> /r/technology
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/jokes"> /r/jokes
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/science"> /r/science
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/europe"> /r/europe
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/northamerica"> /r/northamerica
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/soutamerica"> /r/southamerica
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/asia"> /r/asia
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/australia"> /r/australia
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/antarctica"> /r/antarctica
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/cars"> /r/cars
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/travel"> /r/travel
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/weather"> /r/weather
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/jobs"> /r/jobs
							</label>
							<label class="radio-inline">
								<input type="radio" name="section" id="news" value="/r/misc"> /r/misc
							</label>
						</div>
				
						<button type="submit" name="submit" class="btn btn-primary">Post</button>
					</table>
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
