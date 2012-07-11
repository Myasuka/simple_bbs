<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
	session_start();
	unset($_SESSION["name"]);
	echo "<script>alert('用户退出成功!');
		window.location.href='index.php';</script>";
?> 