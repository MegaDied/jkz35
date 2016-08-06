<?php
	session_start();
	require('dbconnect.php');
	
	$user = $_SESSION['username'];
	if(empty($_SESSION['username']))
	{
		header("location:guests/index.php");
	} else {
		// Register last activity into database
		$query = "UPDATE users SET lastactive=now() WHERE username = '$user'";
		$sql = mysqli_query($connection, $query);
		// Admin query
		$admincheck=mysqli_query($connection,"SELECT username,admin FROM users WHERE username='$user'");
		while($adminrow = $admincheck->fetch_assoc()){
			if($adminrow['admin'] == "1"){
				$admin = 1;
			}
		}
	}
	
	mysqli_close($connection);
?>