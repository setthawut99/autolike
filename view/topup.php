<?php include('../config.php'); include('../option/conn.php'); include('../option/function.php'); ?>
<?php session_start(); ?>
<?php $member = getmember($_SESSION['username']); ?>
<?php if($_SESSION['username'] == ""){  header('Location: login'); exit; } ?>
<?php
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}
$time = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")));
$_KeyI = $conn->query("SELECT * FROM _key WHERE ip = '".$_SERVER['REMOTE_ADDR']."'");
$_KeyI = $_KeyI->fetch_assoc();
if($_KeyI['ip'] == ""){
	$conn->query("INSERT INTO _key (`Key`, ip, time) VALUES ('".RandomKey()."', '".$_SERVER['REMOTE_ADDR']."', '".$time."')");
}else{
	$conn->query("UPDATE _key SET `Key`='".RandomKey()."' WHERE ip = '".$_SERVER['REMOTE_ADDR']."'");
}
$_Key = $conn->query("SELECT * FROM _key WHERE ip = '".$_SERVER['REMOTE_ADDR']."'");
$_Key = $_Key->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?php echo $_CONFIG['description']; ?>">
	<meta name="keywords" content="<?php echo $_CONFIG['keywords']; ?>">
	<title><?php echo $_CONFIG['title']; ?></title>
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
	<link href="<?php echo $_CONFIG['URL']; ?>/assets/css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $_CONFIG['URL']; ?>/assets/css/bootstrap.min.css">
	<link rel="shortcut icon" href="<?php echo $_CONFIG['tapicon']; ?>"/>
  </head>
  <body style="font-family: 'Kanit', sans-serif;">

	<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
	 <div class="container">
	  <a class="navbar-brand" href><i class="fa fa-facebook-official" aria-hidden="true"></i> <?php echo $_CONFIG['NAVTITLE']; ?></a>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item">
			<a class="nav-link" href="dashboard"><i class="fa fa-cogs" aria-hidden="true"></i> จัดการ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="pricing"><i class="fa fa-shopping-cart" aria-hidden="true"></i> เช่าใช้งาน</a>
		  </li>
		  <li class="nav-item active">
			<a class="nav-link" href="topup"><i class="fa fa-credit-card" aria-hidden="true"></i> เติมเงิน</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="changepass"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> เปลี่ยนรหัสผ่าน</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="logout"><i class="fa fa-power-off" aria-hidden="true"></i> ออกจากระบบ</a>
		  </li>
		</ul>
		<div class="form-inline">
		  <span style="color:#FFFFFF">ชื่อผู้ใช้งาน : <?php echo $_SESSION['username'] ?> &nbsp;&nbsp;Point : <?php echo $member['point']; ?> </span>
		</div>
	  </div>
	 </div>
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	</nav>
	</br></br></br></br>
	
	<div class="container">
	  <div class="row justify-content-md-center">
		<div class="col col-lg-4">
			<div class="card" style="background-color: #FAFAFA;">
			  <div class="card-block">
				<h4 style="text-align:center;">เติมเงินสดด้วย TrueMoney</h4>
				<hr class="stylehr">
				<form action="" method="post" id="topup">
				  <div class="form-group">
					<input type="text" class="form-control" placeholder="รหัสบัตรเงินสด TrueMoney 14 หลัก" style="font-family: 'Kanit', sans-serif;text-align:center;" maxlength="14" name="truemoney">
				  </div>
				  <input type="hidden" name="_Key" value="<?php echo $_Key['Key']; ?>">
				  <button type="submit" class="btn btn-outline-info btn-lg btn-block" style="font-family: 'Kanit', sans-serif;" data-loading-text="<i class='fa fa-spinner fa-spin '></i>&nbsp;&nbsp;รอสักครู่">ตกลง</button>
				</form>
			  </div>
			</div>
			</br>
		</div>
		<div class="col col-lg-8">
			<div class="card" style="background-color: #FAFAFA;">
			  <div class="card-block">
				<h4 style="text-align:center;">ประวัติการเติมเงิน</h4>
				<hr class="stylehr">
				  <table class="table table-bordered">
					<thead>
					  <tr>
						<th style="text-align:center;">เลขบัตร</th>
						<th style="text-align:center;">เวลา</th>
						<th style="text-align:center;">จำนวน</th>
						<th style="text-align:center;">สถานะ</th>
					  </tr>
					</thead>
					<tbody>
<?php
$listtrue = $conn->query("SELECT * FROM truemoney WHERE uid = '".$_SESSION['username']."' ORDER BY `truemoney`.`id` DESC LIMIT 5");

if ($listtrue->num_rows > 0) {
    while($row = $listtrue->fetch_assoc()) {
?>
					  <tr>
						<td style="text-align:center;"><?php echo $row['truemoney']; ?></td>
						<td style="text-align:center;"><?php echo $row['time']; ?></td>
						<td style="text-align:center;"><?php echo $row['amount']; ?></td>
						<td style="text-align:center;"><?php if($row['stats'] == 2){ echo '<span style="color:blue"><i class="fa fa-circle-o-notch fa-spin" aria-hidden="true"></i> กำลังตรวจสอบ</span>'; }elseif($row['stats'] == 1){ echo '<span style="color:#009900"><i class="fa fa-check" aria-hidden="true"></i> สำเร็จ</span>'; }elseif($row['stats'] == 3 or $row['stats'] == 4 or $row['stats'] == 5){ echo '<span style="color:red"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ไม่สำเร็จ</span>'; } ?></td>
					  </tr>
<?php }} ?>
					</tbody>
				  </table>
			  </div>
			</div>
			</br>
		</div>
	  </div>
	</div>

	</br>
	<h6><center>COPYRIGHT © <?php echo date('Y'); ?> ALL SYSTEM BY <a href="https://ball-tools.com/">BALL-TOOLS.COM</a></center></h6>
	<script src="<?php echo $_CONFIG['URL']; ?>/assets/js/jquery-1.12.4.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo $_CONFIG['URL']; ?>/assets/js/tether.min.js"></script>
    <script src="<?php echo $_CONFIG['URL']; ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo $_CONFIG['URL']; ?>/assets/js/bootstrap3.min.js"></script>
	<script src="<?php echo $_CONFIG['URL']; ?>/assets/js/balltools.js"></script>
  </body>
</html>