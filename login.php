<?php
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$logged_in = FALSE;
	
	$link = mysqli_connect('prosze3.pl', '00080572_prosze3', 'BO33md39', '00080572_prosze3');
	if(!$link) 
	{ 
		echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error();
	}
	
	$result = mysqli_query($link, "SELECT * FROM users WHERE user='$user'");
	$rekord = mysqli_fetch_array($result);
	while(true)
	{
		if(!$rekord)
		{
			header('Location: http://prosze3.pl/dominik/z7/fail.html');
			exit();
		}
		else
		{
			if($rekord['pass']==$pass)
			{
				if($rekord['fails']<3)
				{
					$logged_in = TRUE;
					setcookie("logged_in", $logged_in, time()+(60*60*1));
					setcookie("user", $user, time()+(60*60*1));
					setcookie("pass", $pass, time()+(60*60*1));
					header('Location: http://prosze3.pl/dominik/z7/add_info.php');
					exit();
				}
				else
				{
					header('Location: http://prosze3.pl/dominik/z7/account_blocked.html');
					exit();
				}
			}
			else
			{
				setcookie("user", $user, time()+(60*60*1));
				header('Location: http://prosze3.pl/dominik/z7/add_fail.php');
				exit();
			}
		}
	break;
	}
?>