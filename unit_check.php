<?php
require('config.php');

$id = mysql_real_escape_string($_POST['id']);
//$phone = mysql_real_escape_string($_POST['phone']);

$sql = "SELECT * FROM `unit` WHERE `id` = '$id' AND `state` = 1 AND `isdeleted` = 1";
$result = mysql_query($sql);
#如果用ID查不到結果
if(mysql_num_rows($result)==0){
	header("Location: unit_input.php?msg=統編錯誤");
	exit();
}
$row = mysql_fetch_assoc($result);
/*$phoneLast4char = substr($row['phone'], -4);
#如果電話末四碼不對
if($phone!=$phoneLast4char){
	header("Location: unit_input.php?msg=電話末四碼錯誤");
	exit();
}*/
#如果人數已滿
if($row['registered']>=$row['num']){
	header("Location: unit_input.php?msg=貴公司名額已滿<br>欲增加報名人數請洽(02)2397-2227分機298劉小姐");
	exit();
}

if ($row['type']=='L' or $row['type']=='P' or $row['type']=='H' ) {
	header("Location: register.php?id=$id");
	exit();
}else{
	header("Location: register_v.php?id=$id");
	exit();
}

?>