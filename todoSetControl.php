<?php
require("todoModel.php");

$msgID=(int)$_GET['applied'];
$act =$_GET['act'];
if ($msgID>0) {
	switch($act) {
		case 'psign':
			PFinished($msgID);
			break;
        case 'tsign':
            TFinish($msgID);
            break;
        case 'ssign':
            SFinish($msgID);
            break;
		case 'reject':
			rejectJob($msgID);
			break;
		case 'ok':
			OKJob($msgID);
			break;
		case 'cancel':
			cancelJob($msgID);
        case 'add':
			addJob($msgID);
			break;
		default:
			$msg="Invalid action. Ignored.";
			break;
	}
}
header("Location: todoListView.php?m=$msg");
?>

