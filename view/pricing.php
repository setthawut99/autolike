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
		  <li class="nav-item">
			<a class="nav-link" href="dashboard"><i class="fa fa-cogs" aria-hidden="true"></i> จัดการ</a>
		  </li>
		  <li class="nav-item active">
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
$package = $conn->query("SELECT * FROM package ORDER BY `package`.`id` ASC");
if ($package->num_rows > 0) {
    while($row = $package->fetch_assoc()) {
?>
		<div class="col col-lg-4">
			<div class="card" style="background-color: #FAFAFA;">
			  <div class="card-block">
				<h5 style="text-align:center;"><i class="fa fa-credit-card" aria-hidden="true"></i> ราคา <?php echo $row['pricing']; ?> บาท</h5>
				<hr class="stylehr">
				<h5 style="text-align:center;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> ไลค์ต่อโพสต์ : <?php echo $row['max_like']; ?> ไลค์</h5>
				<hr class="stylehr">
				<h5 style="text-align:center;"><i class="fa fa-cloud" aria-hidden="true"></i> จำกัด  : <?php echo $row['day_maxlike']; ?> โพสต์ต่อวัน</h5>
				<hr class="stylehr">
				<h5 style="text-align:center;"><i class="fa fa-clock-o" aria-hidden="true"></i> จำนวนวันที่ใด้รับ : <?php echo $row['day_use']; ?> วัน</h5>
				<hr class="stylehr">
				<a href data-toggle="modal" data-target="#buy_<?php echo $row['id']; ?>" class="btn btn-outline-warning btn-lg btn-block" style="font-family: 'Kanit', sans-serif;">เปิดใช้งาน</a>
			  </div>
			</div>
			</br>
		</div>
		<div class="modal fade" id="buy_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">เปิดใช้งาน : <?php echo $row['name']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <form action="" method="post">
				  <div class="modal-body">
					<label for="exampleInputEmail1">ลิ้ง URL Facebook ของท่าน เช่น <span style="color:red;"><b>( https://www.facebook.com/YourProfileName )</b></span></label>
					<input type="text" class="form-control" style="font-family: 'Kanit', sans-serif;" placeholder="ลิ้ง URL Facebook ของท่าน" name="url">
				  </div>
				  <div class="modal-footer">
					<button type="submit" name="buy" value="<?php echo $row['id']; ?>" class="btn btn-outline-success btn-lg btn-block" style="font-family: 'Kanit', sans-serif;">ตกลง</button>
				  </div>
			  </form>
			</div>
		  </div>
		</div>
<?php }} ?>
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

if(isset($_POST['buy'])){
	
	if($_POST['url'] == ""){
		exit('<script>swal("", "ลิ้ง URL Facebook ของท่านต้องไม่ว่างเปล่าครับ", "error");</script>');
	}
	
	$package = $conn->query("SELECT * FROM package WHERE id = '".antisql($_POST['buy'])."'");
	$package = $package->fetch_assoc();
	
	if($member['point'] < $package['pricing']){
		exit('<script>swal("", "Point ของท่านไม่เพียงพอ", "error");</script>');
	}
	
	$GetUid = GetUid($_POST['url']);
	if(!is_numeric($GetUid)){
		exit('<script>swal("", "ลิ้ง URL Facebook ของท่านไม่ถูกต้อง", "error");</script>');
	}
	
	$conn->query("UPDATE member SET point = point-'".$package['pricing']."' WHERE username = '".$_SESSION['username']."'");
	$expired = date("Y-m-d H:i:s", mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$package['day_use'],date("Y")));
	
	$conn->query("INSERT INTO user_like (username ,uid, package, expired, id_post, day_like, like_use, like_method, status) VALUES ('".$_SESSION['username']."' ,'".$GetUid."', '".$package['id']."', '".$expired."', '0', '0', '1', 'LIKE', '1')");
	exit('<script>swal("", "เปิดใช้งานเรียบร้อยแล้ว", "success").then(function() {window.location = "dashboard";});;</script>');
	
	
	
}

?>