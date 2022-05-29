<?php
include('conn.php');
include('function.php');

session_start();
if($_SESSION['username'] == ""){
	exit(json_encode(array('error' => true, 'msg' => 'เข้าสู่ระบบก่อนทำรายการ')));
}

if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}

$_Key = $conn->query("SELECT * FROM _key WHERE ip = '".$_SERVER['REMOTE_ADDR']."'");
$_Key = $_Key->fetch_assoc();

if($_Key['Key'] != $_POST['_Key']){
	exit(json_encode(array('error' => true, 'msg' => 'เกิดข้อผิดพลาดโปรดติดต่อ แอดมิน')));
}else{
	$conn->query("UPDATE _key SET `Key`='".RandomKey()."' WHERE ip = '".$_SERVER['REMOTE_ADDR']."'");
}

if($_POST['truemoney'] == ""){
	exit(json_encode(array('error' => true, 'msg' => 'กรอกข้อมูลให้ครบด้วยครับ')));
}

if(strlen($_POST['truemoney']) != "14" or !is_numeric($_POST['truemoney'])){
	exit(json_encode(array('error' => true, 'msg' => 'รูปแบบบัตรเงินสดไม่ถูกต้อง')));
}


$cktrue = $conn->query("SELECT * FROM truemoney WHERE truemoney = '".$_POST['truemoney']."'");
$cktrue = $cktrue->num_rows;

if($cktrue != 0){
	exit(json_encode(array('error' => true, 'msg' => 'มีบัตรเงินสดอยู่ในระบบแล้วครับ')));
}


$bantime = date("Y-m-d H:i:s", mktime(date("H")-1,date("i"),date("s"),date("m"),date("d"),date("Y")));

$numban = $conn->query("SELECT * FROM truemoney WHERE userip = '".$_SERVER['REMOTE_ADDR']."' and time > '".$bantime."' and stats != '1'");
$numban = $numban->num_rows;

if($numban >= '3'){
	exit(json_encode(array('error' => true, 'msg' => 'เติมเงินผิดเยอะเกินไปรอ 1 ชั่วโมงแล้วมาเติมใหม่นะครับ')));
}

curl("http://203.146.127.112/tmpay.net/TPG/backend.php?merchant_id=".$_CONFIG['shopid']."&password=".$_POST['truemoney']."&resp_url=".$_CONFIG['reurl']."");

$conn->query("INSERT INTO truemoney (uid, truemoney, amount, stats, userip, time) VALUES ('".$_SESSION['username']."', '".$_POST['truemoney']."', '0.00', '2', '".$_SERVER['REMOTE_ADDR']."', '".date("Y-m-d H:i:s")."')");
exit(json_encode(array('error' => false, 'msg' => 'รับรหัสบัตรเงินสดทรูมันนี่ของท่านแล้วรอตรวจสอบไม่เกิน 1-5 นาทีครับ')));
?>