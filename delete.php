<?php
$file_name=$_POST['delete_file'];
$cat_name=$_POST['delete_cat'];
$cur_dir =$_COOKIE['cur_dir'];

if(isset($_POST['delete_file']))
{
	$dir_delete=$cur_dir."/".$file_name;
	unlink($dir_delete);
}

if(isset($_POST['delete_cat']))
{
	$dir_delete=$cur_dir."/".$cat_name;
	rmdir($dir_delete);
}

header('Location: http://prosze3.pl/dominik/z7/panel.php');
exit();
?>