<?php
	require 'conn_BBS.php';
	$maxRows_thread = 5;
	$pageNum_thread = 0;
	if(isset($_GET['pageNum_thread'])){
		$pageNum_thread = $_GET['pageNum_thread'];
	}
	$StartRow_thread = $pageNum_thread * $maxRows_thread;
	$query_thread = "SELECT thread.ID, thread.title, thread.author,thread.content,thread.time, thread.numHit, 
				COUNT( re_thread.reID ) AS numRe,
				Max( if( re_thread.reTime, re_thread.reTime, thread.time ) ) AS NewUpdate FROM thread
				LEFT JOIN re_thread ON thread.ID = re_thread.reID
				GROUP BY thread.ID, thread.title, thread.author
				ORDER BY NewUpdate DESC";
	mysql_query("SET NAMES GB2312");
	$query_limit_thread = sprintf("%s LIMIT %d, %d", $query_thread ,$StartRow_thread, $maxRows_thread);
	$thread = mysql_query($query_limit_thread , $conn_bbs ) or die(mysql_error());
	$row_thread = mysql_fetch_assoc($thread);
	$totalRows_thread = mysql_num_rows($thread);
	if (isset($_GET['totalRows_thread'])) {
		$totalRows_thread = $_GET['totalRows_thread'];
	}else {
		$all_thread = mysql_query($query_thread);
		$totalRows_thread = mysql_num_rows($all_thread);
	}
	$totalPages_thread = ceil($totalRows_thread/$maxRows_thread);
?>