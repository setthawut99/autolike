<?php include('../config.php'); include('../option/conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?php echo $_CONFIG['description']; ?>">
	<meta name="keywords" content="<?php echo $_CONFIG['keywords']; ?>">
	<title>404 Page Not Found</title>
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
	</br>
	
	<div class="container">
	  <div class="row justify-content-md-center">
		<div class="col col-lg-12">
			<div class="card card-inverse card-danger text-center">
			  <div class="card-block">
				<blockquote class="card-blockquote">
				  <p>404 Page Not Found</p>
				  <footer>ไม่พบหน้าที่ท่านร้องขอ</footer>
				</blockquote>
			  </div>
			</div>
		</div>
	  </div>
	</div>

	</br>
	<h6><center>COPYRIGHT © <?php echo date('Y'); ?> ALL SYSTEM BY MAY-LIKE.COM</center></h6>
	<script src="<?php echo $_CONFIG['URL']; ?>/assets/js/jquery-1.12.4.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo $_CONFIG['URL']; ?>/assets/js/tether.min.js"></script>
    <script src="<?php echo $_CONFIG['URL']; ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?php echo $_CONFIG['URL']; ?>/assets/js/bootstrap3.min.js"></script>
	<script src="<?php echo $_CONFIG['URL']; ?>/assets/js/basdy.js"></script>
  </body>
</html>