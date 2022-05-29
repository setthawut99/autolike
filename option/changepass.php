<?php
include('conn.php');
include('function.php');

session_start();
if($_SESSION['username'] == ""){
	exit(json_encode(array('error' => true, 'msg' => 'เข้าสู่ระบบก่อนทำรายการ')));
}

if($_POST['password'] == "" or $_POST['npassword'] == "" or $_POST['npassword2'] == ""){
	exit(json_encode(array('error' => true, 'msg' => 'กรอกข้อมูลให้ครบด้วยครับ')));
}
if(strlen($_POST['npassword']) > '20'){
	exit(json_encode(array('error' => true, 'msg' => 'กรอกข้อมูลเกินกำหนดครับ')));
}
if($_POST['npassword'] != $_POST['npassword2']){
	exit(json_encode(array('error' => true, 'msg' => 'Confirm NewPassword ผิดพลาดครับ')));
}

$member = $conn->query("SELECT * FROM member WHERE username = '".$_SESSION['username']."'");
$member = $member->fetch_assoc();

$member = getmember($_SESSION['username']);

if($member['password'] != $_POST['password']){
	exit(json_encode(array('error' => true, 'msg' => 'ป้อนรหัสผ่านเดิมไม่ถูกต้อง')));
}

$conn->query("UPDATE member SET password='".antisql($_POST['npassword'])."' WHERE username = '".$_SESSION['username']."'");
exit(json_encode(array('error' => false, 'msg' => 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว')));
?>