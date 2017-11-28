<?php
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	
	$link = mysqli_connect('prosze3.pl', '00080572_prosze3', 'BO33md39', '00080572_prosze3');
	if(!$link) 
	{ 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error();
	}
	
	$result = mysqli_query($link, "SELECT * FROM users WHERE user='$user'");
	$rekord = mysqli_fetch_array($result);

	if($rekord)
	{
		header('Location: http://prosze3.pl/dominik/z7/reg_fail.html');
		exit();
	}
	else
	{
		$add_user = "INSERT INTO users (user, pass, fails) VALUES ('".$user."', '".$pass."', '0')";
		mysqli_query($link, $add_user);
		
		mkdir("cat/".$user, 0700);
		
		header('Location: http://prosze3.pl/dominik/z7/index.html');
		exit();
	}
?>