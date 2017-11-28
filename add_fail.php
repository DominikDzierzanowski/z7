<?php
	$user = $_COOKIE['user'];
	
	$link = mysqli_connect('prosze3.pl', '00080572_prosze3', 'BO33md39', '00080572_prosze3');
	if(!$link) 
	{ 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error();
	}
	
	$add_info = "INSERT INTO logi (user, status) VALUES ('".$user."', 'Nieudane')";
	mysqli_query($link, $add_info);

	$query = "UPDATE users SET fails = fails + 1 WHERE user='".$user."'";
	mysqli_query($link, $query);
	
	setcookie("user", "", 1);
	
	header('Location: http://prosze3.pl/dominik/z7/fail.html');
	exit();
?>