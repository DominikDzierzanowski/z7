<?php
$dir = "z7/".$_COOKIE['cur_dir']."/";
if (is_uploaded_file($_FILES['plik']['tmp_name']))
{
	move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$dir.$_FILES['plik']['name']);
}
else 
{
	echo 'B��d przy przesy�aniu danych!';
}
		
header('Location: http://prosze3.pl/dominik/z7/panel.php');
exit();
?>