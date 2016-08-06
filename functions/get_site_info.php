<?php
	require("dbconnect.php");
	$query = "SELECT * FROM info WHERE id = 1"; //Select id to make sure the original info is selected.
	$sql = mysqli_query($connection, $query);
	
	#Assigning info to variables with 'site' in front, so other variables don't get mixed up.
	while($siteinfo = $sql->fetch_assoc()){
		$sitetitle = $siteinfo['title'];
		$sitemail = $siteinfo['email'];
		$sitelink = $siteinfo['website'];
	}
?>