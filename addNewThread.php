<?php
	session_start(); 
	require 'conn_BBS.php';
	$sql = "INSERT INTO `thread` (ID,title,content,author,time,numHit) 
			VALUES('".$_POST['ID']."','".$_POST['title']."','".$_POST['content']."','".$_SESSION['name']."',
			'".date("Y-m-d H:i:s")."','0')";
	mysql_query($sql, $conn_bbs) or die(mysql_error());
	echo "<script>alert('·¢Ìû³É¹¦!');
	 	window.location.href='index.php';</script>";
?>