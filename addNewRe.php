<?php
	session_start(); 
	require 'conn_BBS.php';
	mysql_query("INSERT INTO `re_thread` (reID,reTitle,reContent,reAuthor,reTime) 
				VALUES('".$_POST['ID']."','".$_POST['title']."','".$_POST['content']."','".$_SESSION['name']."',
				'".date("Y-m-d H:i:s")."')",$conn_bbs) or die(mysql_error());
	echo "<script>alert('»ØÌû³É¹¦!');
	 window.location.href='index.php';</script>";
?>