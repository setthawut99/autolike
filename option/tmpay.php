<?PHP
set_time_limit(0);
include("../config.php");
include("conn.php");

if(!isset($_SERVER["HTTP_CF_CONNECTING_IP"])){
	$serverip = $_SERVER['REMOTE_ADDR'];
}else{
	$serverip = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

if($serverip != "203.146.127.112"){
	echo "EXIT FOR IP ".$serverip."";
	exit;
}

$truemoney = $conn->query("SELECT * FROM truemoney WHERE truemoney = '".$_GET['password']."'");
$truemoney = $truemoney->fetch_assoc();



$conn->query("UPDATE truemoney SET stats = '".$_GET['status']."',amount = '".$_GET['real_amount']."' WHERE truemoney = '".$_GET['password']."'");


if ($_GET['status'] != "1"){
	exit('SUCCEED|TOPPED_UP_THB_'.$_GET['real_amount'].'');
}

$addmoney = $_GET['real_amount']*1;

$conn->query("UPDATE member SET point=point+'".$addmoney."' WHERE username = '".$truemoney['uid']."'");
exit('SUCCEED|TOPPED_UP_THB_'.$_GET['real_amount'].'');

?>