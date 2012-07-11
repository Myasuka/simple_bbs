<?php 
require 'conn_BBS.php';
if (isset($_GET['ID'])) {
	$thread=mysql_query("SELECT * FROM `thread` WHERE ID='".$_GET['ID']."'");  //注意是[]不是()
	$re_Thread=mysql_query("SELECT * FROM `re_thread` WHERE reID='".$_GET['ID']."'");
} 
	$row_thread=mysql_fetch_assoc($thread);
	$totalRows_Thread=mysql_num_rows($thread);
	//$row_reThread=mysql_fetch_assoc($re_Thread);
	$totalRows_reThread=mysql_num_rows($re_Thread);
	mysql_query("UPDATE thread SET numHit=numHit+1 WHERE ID='".$_GET['ID']."'",$conn_bbs); //更新点击次数
?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<table align="center" width="500">
<tr height="50" bgcolor="#dcdcdcd">
<td colspan="2" align="center"><strong>主题帖</strong></td>
</tr>
  <tr>
    <td bgcolor="#c0c0c0" width="90">帖子标题：</td>
    <td ><?php echo $row_thread['title']?></td>
  </tr>
  <tr>
    <td bgcolor="#c0c0c0" width="90">帖子内容：</td>
    <td><?php echo $row_thread['content']?></td>
  </tr>
  <tr>
  	<td bgcolor="#c0c0c0" width="90">发帖时间：</td>
  	<td><?php echo $row_thread['time']?></td>
  </tr>	
  <tr>
    <td><a href="reThread.php?ID=<?php echo $row_thread['ID']?>">回复</a></td>
   </tr>
</table>
<?php 
if (mysql_num_rows($re_Thread)!=0) {
	echo "<table align=\"center\" width=\"500\">
			<tr height=\"50\" bgcolor=\"#dcdcdcd\">
				<td colspan=\"2\" align=\"center\"><strong>回复</strong>
				</td>
			</tr>";
}?>
<?php  while ($row_reThread=mysql_fetch_assoc($re_Thread))  { ?>
 <tr>
    <td bgcolor="#c0c0c0" width="90">回帖内容：</td>
    <td><?php echo $row_reThread['reContent']?></td>
 </tr>
 <tr>
    <td bgcolor="#c0c0c0" width="90">回帖作者：</td>
    <td ><?php echo $row_reThread['reAuthor']?></td>
 </tr>
 <tr>
  	<td bgcolor="#c0c0c0" width="90">回帖时间：</td>
  	<td><?php echo $row_reThread['reTime']?></td>
 </tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
 <?php } ;	
	if ($row_reThread['reContent']!="")
		echo "</table>";
?>
