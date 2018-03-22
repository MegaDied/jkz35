<?php
	$sqlserver = "";    #Mysql Server
	$sqluser = "";        #Mysql Username
	$sqlpass = "";        #Mysql Password

	$sqldb = "";                #CMS database

	$connection = mysqli_connect($sqlserver, $sqluser, $sqlpass, $sqldb) or die ("Can't connect to the Database. Please try again later.");
	# Maak een connectie met de database of stop en laat het bericht "Can't connect to DB" zien
date_default_timezone_set('Europe/Amsterdam');
?>
