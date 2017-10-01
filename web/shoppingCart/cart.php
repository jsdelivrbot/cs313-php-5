<?php 
session_start();

$data = $_GET["data"];

switch ($data) {
	case 'dp':
		$_SESSION["dpCount"] = $_SESSION["dpCount"] + 1;  
		break;
	case 'coke':
		$_SESSION["cokeCount"] = $_SESSION["cokeCount"] + 1;
		break;
	case 'jones':
		$_SESSION["jonesCount"] = $_SESSION["jonesCount"] + 1;
		break;
	case 'md':
		$_SESSION["mdCount"] = $_SESSION["mdCount"] + 1;
		break;
	case 'sprite':
		$_SESSION["spriteCount"] = $_SESSION["spriteCount"] + 1;
		break;
	case 'fanta':
		$_SESSION["fantaCount"] = $_SESSION["fantaCount"] + 1;
		break;
	default:
		echo "nothing worked";
		break;
}

$_SESSION["totalSodas"] = $_SESSION["dpCount"] + $_SESSION["cokeCount"] + $_SESSION["jonesCount"] + $_SESSION["mdCount"] + $_SESSION["spriteCount"] +
  			$_SESSION["fantaCount"];
header("location:browse.php");
die();


?>



