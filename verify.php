<?php
	include('functions/get_site_info.php');
?>

<html>
	<head>
		<title><?php echo $sitetitle; ?> - Verify Account</title>
	</head>
	<body>
		<h1>Verify</h1>
		<?php
			require('dbconnect.php');
			if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
				// Verify data
				$email = mysqli_escape_string($connection, $_GET['email']); // Set email variable
				$hash = mysqli_escape_string($connection, $_GET['hash']); // Set hash variable
				$search = mysqli_query($connection, "SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
				$match  = mysqli_num_rows($search);
				
				mysqli_query($connection, "UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
				echo 'You account has been activated. You can login now. <br>You will be redirected in 5 seconds';
				header( "refresh:5;url=index.php" );
			}else{
				echo "We could not activate this account. Possible reasons:<br>-Your account is already activated.<br>-Wrong has. Contact the administrator.<br>-Your e-mail is wrong.<br>-You try SQL injection which is impossible. Try harder next time ;)<br><br>Contact the administrator if your problem is not in the list.";
			}
		?>
	</body>
</html>