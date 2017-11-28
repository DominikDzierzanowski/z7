<?php
$cur_dir =$_COOKIE['cur_dir'];
$cat_name=$_POST['new_cat'];
$dir = $cur_dir."/".$cat_name;
mkdir($dir, 0700);

header('Location: http://prosze3.pl/dominik/z7/panel.php');
exit();
?>