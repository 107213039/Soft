<?php
require_once("dbconnect.php");
function getJobList($bossMode) {
	global $conn;
	if ($bossMode) {
		$sql = "select *from exam where 1;";
	} else {
		$sql = "select *from exam where 1;";
	}
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	return $result;
}


?>