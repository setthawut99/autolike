<?php include('../config.php'); include('../option/conn.php'); include('../option/function.php'); ?>
<?php session_start(); ?>
<?php $member = getmember($_SESSION['username']); ?>
<?php if($_SESSION['username'] == ""){  header('Location: login'); exit; } ?>
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
		  <li class="nav-item active">
			<a class="nav-link" href="dashboard"><i class="fa fa-cogs" aria-hidden="true"></i> จัดการ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="pricing"><i class="fa fa-shopping-cart" aria-hidden="true"></i> เช่าใช้งาน</a>
		  </li>
		  <li class="nav-item">
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
<?php
$likelist = $conn->query("SELECT * FROM user_like WHERE username = '".$_SESSION['username']."'");
if ($likelist->num_rows > 0) {
    while($row = $likelist->fetch_assoc()) {
		$package = $conn->query("SELECT * FROM package WHERE id = '".$row['package']."'");
		$package = $package->fetch_assoc();
?>
		<div class="col col-lg-4">
			<div class="card" style="background-color: #FAFAFA;">
			  <div class="card-block">
				<h5 style="text-align:center;"><img src="https://graph.facebook.com/<?php echo $row['uid']; ?>/picture?width=240&height=240" width="100" class="img-responsive" alt="ปั้มไลค์ฟรี"></h5>
				<hr class="stylehr">
				<h5 style="text-align:center;"><i class="fa fa-user" aria-hidden="true"></i> UID : <?php echo $row['uid']; ?></h5>
				<hr class="stylehr">
				<h5 style="text-align:center;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> แพคเกจ : <?php echo $package['pricing']; ?> บาท</h5>
				<hr class="stylehr">
				<h5 style="text-align:center;"><i class="fa fa-server" aria-hidden="true"></i> สถานะ : <?php if($row['status'] == '1'){ echo '<span style="color:#009C11;">เปิด</span>'; }else{ echo '<span style="color:#D91700;">ปิด</span>'; } ?></h5>
				<hr class="stylehr">
				<h5 style="text-align:center;"><i class="fa fa-clock-o" aria-hidden="true"></i> หมดอายุ : <?php echo $row['expired']; ?></h5>
				<hr class="stylehr">
				<h5 style="text-align:center;"><p>การไลค์โพสต่อวัน <?php echo $row['day_like']; ?> / <?php echo $package['day_maxlike']; ?> </p><div class="progress"><div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row['day_like']*100/$package['day_maxlike']; ?>%"></div></div></h5>
				<hr class="stylehr">
				<a href data-toggle="modal" data-target="#edit_<?php echo $row['id']; ?>" class="btn btn-outline-warning btn-lg btn-block" style="font-family: 'Kanit', sans-serif;">จัดการ</a>
			  </div>
			</div>
			</br>
		</div>
		<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">จัดการ</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form action="" method="post">
				  <div class="modal-body">
					<button type="submit" name="off" value="<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-block" style="font-family: 'Kanit', sans-serif;"><i class="fa fa-power-off" aria-hidden="true"></i> ปิด</button>
					<button type="submit" name="on" value="<?php echo $row['id']; ?>" class="btn btn-outline-success btn-block" style="font-family: 'Kanit', sans-serif;"><i class="fa fa-power-off" aria-hidden="true"></i> เปิด</button>
					<button type="submit" name="renew" value="<?php echo $row['id']; ?>" class="btn btn-outline-warning btn-block" style="font-family: 'Kanit', sans-serif;"><i class="fa fa-history" aria-hidden="true"></i> ต่ออายุ</button>
				  </div>
			  </form>
			</div>
		  </div>
		</div>
<?php }}else{ ?>
		<div class="col col-lg-8">
			<a href="pricing" class="btn btn-outline-danger btn-lg btn-block" style="font-family: 'Kanit', sans-serif;">ท่านยังไม่ใด้เปิดใช้งาน กดที่นี่เพื่อเปิดใช้งานก่อนครับ</a>
		</div>
		</br></br></br></br></br>
<?php } ?>
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

<?php

if(isset($_POST['off'])){
	$user_like = $conn->query("SELECT * FROM user_like WHERE id = '".antisql($_POST['off'])."'");
	$user_like = $user_like->fetch_assoc();

	if($user_like['username'] != $_SESSION['username']){
		exit('<script>swal("", "ไม่สามารถจัดการของคนอื่นใด้", "error").then(function() {window.location = "dashboard";});;</script>');
	}else{
		$conn->query("UPDATE user_like SET  status = '0' WHERE id = '".antisql($_POST['off'])."'");
		exit('<script>swal("", "ปิดการใช้งานเรียบร้อยแล้ว", "success").then(function() {window.location = "dashboard";});;</script>');
	}
}

if(isset($_POST['on'])){
	$user_like = $conn->query("SELECT * FROM user_like WHERE id = '".antisql($_POST['on'])."'");
	$user_like = $user_like->fetch_assoc();

	if($user_like['username'] != $_SESSION['username']){
		exit('<script>swal("", "ไม่สามารถจัดการของคนอื่นใด้", "error").then(function() {window.location = "dashboard";});;</script>');
	}else{
		$conn->query("UPDATE user_like SET  status = '1' WHERE id = '".antisql($_POST['on'])."'");
		exit('<script>swal("", "เปิดการใช้งานเรียบร้อยแล้ว", "success").then(function() {window.location = "dashboard";});;</script>');
	}
}

if(isset($_POST['renew'])){
	$user_like = $conn->query("SELECT * FROM user_like WHERE id = '".antisql($_POST['renew'])."'");
	$user_like = $user_like->fetch_assoc();
	
	
	if($user_like['username'] != $_SESSION['username']){
		exit('<script>swal("", "ไม่สามารถจัดการของคนอื่นใด้", "error").then(function() {window.location = "dashboard";});;</script>');
	}else{

	
		$package = $conn->query("SELECT * FROM package WHERE id = '".antisql($user_like['package'])."'");
		$package = $package->fetch_assoc();
		
		if($member['point'] < $package['pricing']){
			exit('<script>swal("", "Point ของท่านไม่เพียงพอ", "error").then(function() {window.location = "dashboard";});;</script>');
		}
		
		$expired_user = (strtotime($user_like['expired']))-(strtotime(now));
		$expired = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s")+$expired_user,date("m"),date("d")+$package['day_use'],date("Y")));
		$conn->query("UPDATE user_like SET expired = '".$expired."' WHERE id = '".antisql($_POST['renew'])."'");
		$conn->query("UPDATE member SET point = point-'".$package['pricing']."' WHERE username = '".$_SESSION['username']."'");
		exit('<script>swal("", "ต่ออายุเรียบร้อยแล้วครับ", "success").then(function() {window.location = "dashboard";});;</script>');
	
	}
}
?>