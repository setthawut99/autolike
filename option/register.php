<?php
include('conn.php');
include('function.php');

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

if($_POST['username'] == "" or $_POST['password'] == "" or $_POST['password2'] == ""){
	exit(json_encode(array('error' => true, 'msg' => 'กรอกข้อมูลให้ครบด้วยครับ')));
}
if($_POST['password'] != $_POST['password2']){
	exit(json_encode(array('error' => true, 'msg' => 'Confirm Password ผิดพลาดครับ')));
}
if(strlen($_POST['username']) > '20' or strlen($_POST['password']) > '20'){
	exit(json_encode(array('error' => true, 'msg' => 'กรอกข้อมูลเกินกำหนดครับ')));
}
$member = $conn->query("SELECT * FROM member WHERE username = '".antisql($_POST['username'])."'");
$member = $member->fetch_assoc();

if($member['username'] != ""){
	exit(json_encode(array('error' => true, 'msg' => 'ชื่อผู้ใช้งานมีผู้อื่นใช้งานไปแล้วครับ')));
}

$conn->query("INSERT INTO member (username, password, point) VALUES ('".antisql($_POST['username'])."', '".antisql($_POST['password'])."', '".$_CONFIG['RegisterPoint']."')");
exit(json_encode(array('error' => false, 'msg' => 'สมัครสมาชิกเรียบร้อยแล้วครับ')));
?>