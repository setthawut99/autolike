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
		  <li class="nav-item">
			<a class="nav-link" href="pricing"><i class="fa fa-shopping-cart" aria-hidden="true"></i> เช่าใช้งาน</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="topup"><i class="fa fa-credit-card" aria-hidden="true"></i> เติมเงิน</a>
		  </li>
		  <li class="nav-item active">
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
		<div class="col col-lg-6">
			<div class="card" style="background-color: #FAFAFA;">
			  <div class="card-block">
				<h4 style="text-align:center;">เปลี่ยนรหัสผ่าน</h4>
				<hr class="stylehr">
				<form action="" method="post" id="changepass">
				  <div class="form-group">
					<label for="exampleInputEmail1">Password รหัสผ่านเดิม :</label>
					<input type="password" class="form-control" style="font-family: 'Kanit', sans-serif;" placeholder="Password" name="password" maxlength="20">
				  </div>
				  <div class="form-group">
					<label for="exampleInputEmail1">NewPassword รหัสผ่านใหม่ :</label>
					<input type="password" class="form-control" style="font-family: 'Kanit', sans-serif;" placeholder="NewPassword" name="npassword" maxlength="20">
				  </div>
				  <div class="form-group">
					<label for="exampleInputEmail1">Confirm NewPassword รหัสผ่านใหม่อีกครั่ง :</label>
					<input type="password" class="form-control" style="font-family: 'Kanit', sans-serif;" placeholder="ReNewPassword" name="npassword2" maxlength="20">
				  </div>
				  <button type="submit" class="btn btn-outline-success btn-lg btn-block" style="font-family: 'Kanit', sans-serif;" data-loading-text="<i class='fa fa-spinner fa-spin '></i>&nbsp;&nbsp;รอสักครู่"><i class="fa fa-cog" aria-hidden="true"></i> ตกลง</button>
				</form>
			  </div>
			</div>
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