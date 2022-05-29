<?php
include('conn.php');
include('function.php');
session_start();

$login = $conn->query("SELECT * FROM member WHERE username = '".antisql($_POST['username'])."' and password = '".antisql($_POST['password'])."'");
$login = $login->fetch_assoc();

if($login['username'] != ""){
	$_SESSION['username'] = $login['username'];
	exit(json_encode(array('error' => false, 'msg' => 'เข้าสู่ระบบเรียบร้อยแล้วครับ')));
}else{
	exit(json_encode(array('error' => true, 'msg' => 'ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้องครับ')));
}
?>