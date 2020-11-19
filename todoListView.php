<?php
session_start();
if (! isset($_SESSION['uID']) or $_SESSION['uID']<="") {
	header("Location: loginForm.php");
} 
if ($_SESSION['uID']=='principal'){
	$bossMode = 1;
} 
if ($_SESSION['uID']=='secretary'){
	$bossMode = 2;
}
if ($_SESSION['uID']=='teacher'){
	$bossMode = 3;
}
else {
	$bossMode=0;
}
require("todoModel.php");
if (isset($_GET['m'])){
	$msg="<font color='red'>" . $_GET['m'] . "</font>";
} else {
	$msg="Good morning";
}

$result=getJobList($bossMode);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>my Todo List !! </p>
<hr />
<div><?php echo $msg; ?></div><hr>
<a href="loginForm.php">login</a> | <a href="todoEditForm.php?id=-1">Add Task</a> <br>
<table width="700" border="1">
  <tr>
    <td>編號</td>
    <td>姓名</td>
    <td>學號</td>
	<td>爸爸</td>
    <td>媽媽</td>
	<td>申請種類</td>
	<td>-</td>
  </tr>
<?php

while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<td>" , htmlspecialchars($rs['applied']), "</td>";
    echo "<td>" , htmlspecialchars($rs['StdName']), "</td>";
	echo "<td>" , htmlspecialchars($rs['StdID']), "</td>";
	echo "<td>" , htmlspecialchars($rs['Dad']), "</td>";
    echo "<td>" , htmlspecialchars($rs['Mom']), "</td>";
    echo "<td>" , htmlspecialchars($rs['FundType']), "</td>";
	echo "</td></tr>";
}
?>
</table>
</body>
</html>
