<?php include('config.php'); ?>
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
			<a class="nav-link" href="<?php echo $_CONFIG['URL']; ?>"><i class="fa fa-home" aria-hidden="true"></i> หน้าแรก</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="npricing"><i class="fa fa-shopping-cart" aria-hidden="true"></i> ราคา</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="about"><i class="fa fa-heart" aria-hidden="true"></i> เกี่ยวกับเรา</a>
		  </li>
		</ul>
		<div class="form-inline">
		  <a class="btn btn-outline-success" href="login" style="font-family: 'Kanit', sans-serif;"><i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ</a>&nbsp;
		  <a class="btn btn-outline-info" href="register" style="font-family: 'Kanit', sans-serif;"><i class="fa fa-user-plus" aria-hidden="true"></i> สมัครสมาชิก</a>
		</div>
	  </div>
	 </div>
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	</nav>
	
	<div style="background-image: url('<?php echo $_CONFIG['URL']; ?>/assets/image/6HsltRhK.gif');-webkit-background-size: 100% 100%, auto;">
		<div class="container">
		  <div class="row justify-content-md-center">
			<div class="col col-lg-12">
				<canvas></canvas>
				<h1 style="color:#FFFFFF;text-align:center;">บริการออโต้ไลค์ เพิ่มไลค์อัตโนมัติ ราคาโดนใจ</h1>
				<h5 style="color:#FFFFFF;text-align:center;"> บริการออโต้ไลค์เพิ่มไลค์ให้อัตโนมัติเมื่อท่านโพส โดยไม่ต้องนั่งเข้าเว็บไซต์ไปปั้มทีละโพสทุกครัง สะดวกสบายไม่ติดขัด </h5>
				<canvas></canvas>
			</div>
		  </div>
		</div>
	</div>	
	
	<div class="py-5" style="background-color:#f7f7f7;-webkit-background-size: 100% 100%, auto;">
		<div class="container">
		  <div class="row justify-content-md-center">
			<div class="col col-lg-6">
				<img src="<?php echo $_CONFIG['URL']; ?>/assets/image/cj4JqaOL.png" width="350">
			</div>
			<div class="col col-lg-6">
				<h3>ออโต้ไลค์คืออ่ะไร ดียังไง ?</h3>
				<span> ออโต้ไลค์คือระบบออโต้ไลค์ ที่เวลาท่านโพส ระบบจะทำการไลค์ให้ท่านทันที </br>โดยที่ท่านไม่ต้องมานั่งเข้าเว็บไซต์นั่งกดปั้มไลค์ทีละโพส </br>สะดวกสบายไม่ติดขัด </span>
				</br></br></br>
				<h3>ใช้แล้วจะไม่โดนสแปม หรอ ?</h3>
				<span> ออโต้ไลค์ของเราเป็นผู้ใช้งานจริงๆไปไลค์ให้ท่านไม่ใช้บอทแต่อย่างใด</br>เพราะฉะนั้นท่านจะไม่โดนสแปม หรือโดนระงับการใช้งานจาก Facebook แน่นอน </span>
			</div>
		  </div>
		</div>
	</div>
	
<div class="container py-5">
  <div class="row justify-content-md-center">
    <div class="col col-lg-4 text-center">
      <i class="fa fa-tachometer fa-4x" aria-hidden="true"></i>
	  </br>
	  <h4>สะดวกสบาย</h4>
	  <span>ทางเว็บไซต์ของเรามี Control Panel </br>ให้ท่านใช้งาน เพื่อความสดวกสบาย</span>
	  </br>
    </div>
    <div class="col col-lg-4 text-center">
      <i class="fa fa-heart fa-4x" aria-hidden="true"></i>
	  </br>
	  <h4>มีทีมงานคอยดูแล</h4>
	  <span>เรามีทีมงานคอยซัพพอร์ตท่านเมือเกิดปัญหา </br>ด้วยทีมงานที่มีความเชียวชาญ</span>
	  </br>
    </div>
    <div class="col col-lg-4 text-center">
      <i class="fa fa-clock-o fa-4x" aria-hidden="true"></i>
	  </br>
	  <h4>รวดเร็ว</h4>
	  <span>เว็บไซต์ของเราไม่ต้องรอทีมงาน </br>เติมเงินแล้วเปิดใช้งานใด้เลยทันที</span>
	  </br>
    </div>
  </div>
</div>
	
	</br>
	<h6><center>
	  COPYRIGHT © <?php echo date('Y'); ?> ALL SYSTEM BY <a href="https://ball-tools.com/">BALL-TOOLS.COM</a> 
	</center></h6>
	<script src="<?php echo $_CONFIG['URL']; ?>/assets/js/jquery-1.12.4.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo $_CONFIG['URL']; ?>/assets/js/tether.min.js"></script>
    <script src="<?php echo $_CONFIG['URL']; ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo $_CONFIG['URL']; ?>/assets/js/bootstrap3.min.js"></script>
	<script src="<?php echo $_CONFIG['URL']; ?>/assets/js/balltools.js"></script>
	
  </body>
</html>