<?php
require 'sql_thread.php';
?>
<?php session_start();?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
<meta content="text/html;charset=GB2312" http-equiv="Content-Type" />
<title>茶干的BBS</title>
</head>
<body bgcolor="#f1daca">
<?php 
	if (!isset($_SESSION['name'])) {
		echo "
			<form method=\"post\" action=\"login.php\" >
		<table align=\"center\">
		<tr height=\"30\">
		<td>用户昵称</td>
		<td><input type=\"text\" name=\"name\"></td>
		<td>用户密码</td>
		<td><input type=\"password\" name=\"password\"></td>
		<td><input type=\"submit\" name=\"login\" value=\"登录\"></td>
		<td><a href=\"register.html\">点击注册</a></td>
		</tr></table>
	</form>";
} else 
echo "<table align=\"center\">
		<tr height=\"30\">
		<td >欢迎用户 </td><td><em><strong>$_SESSION[name]</strong><em></td>
		<td><a href=\"unset.php\">点击注销</a></td></tr></table>"; 
?>
<form method="get" action="thread.php">
<table border="5" align="center" cellpadding="0" cellspacing="0" width="900">
	<tr height="90" >
	<td width="40%" colspan="2" align="center"><strong>茶干的BBS</strong></td>
	<td width="20%" align="center"><a href="index.php">首页</a></td>
	<td width="20%" align="center"><a href="newThread.php">发表主题</a></td>
	<td width="20%" align="center"><a href="login.php">管理论坛</a></td>
</tr>

<tr bgcolor="#f2f2f2" height="50">
	<td width="20%" align="center">主题</td>
	<td width="20%" align="center">发言人</td>
	<td width="20%" align="center">点击次数</td>
	<td width="20%" align="center">回复</td>
	<td width="20%" align="center">最新回复时间</td>
</tr>

<?php do {?>
<tr>
	<td height="30" align="center"><a href="thread.php?&ID=<?php echo $row_thread['ID'] ?>">
	<?php echo $row_thread['title'];?></a>
	<input name="ID" id="ID" type="hidden" value="<?php echo $row_thread['ID'];?>"></td>
	<td height="30" align="center"><?php echo $row_thread['author'];?></td>
	<td height="30" align="center"><?php echo $row_thread['numHit'];?></td>
	<td height="30" align="center"><?php echo $row_thread['numRe'];?></td>
	<td height="30" align="center"><?php echo $row_thread['NewUpdate'];?></td>
</tr>
<tr>
	<td colspan="5" height="2" bgcolor="#acacac">&nbsp;</td>
</tr>	
<?php }while ($row_thread = mysql_fetch_assoc($thread)) ;?>
</table>
</form>
<table align="center">
<tr>
	<td><a href="<?php printf("%s?pageNum_thread=0",$currentPage);?>" >第一页</a>&nbsp;</td>
	<td><a href="<?php printf("%s?pageNum_thread=%d",$currentPage,max(0,$pageNum_thread-1));?>">上一页</a>&nbsp;</td>
	<td><a href="<?php printf("%s?pageNum_thread=%d",$currentPage,min($totalPages_thread-1,$pageNum_thread+1));?>">下一页</a>&nbsp;</td>
	<td><a href="<?php printf("%s?pageNum_thread=%d",$currentPage,$totalPages_thread-1);?>">最后一页</a></td>
</tr>
</table>
</body>
</html>

<!-- -
	重复的代码就意味着风险         Change 
	就走寻常路，不做美特斯邦威
	不要在不该发挥创造性的地方乱发挥
 -->


