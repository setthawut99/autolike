<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FB-TOOLS -</title>
        <link type="text/css" href="<?=$baseurl?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="<?=$baseurl?>/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="<?=$baseurl?>/assets/css/theme.css" rel="stylesheet">
        <link type="text/css" href="<?=$baseurl?>/assets/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
		<link type="text/css" href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
		<link type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">FB-TOOLS </a>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li>
								<a href="?page=main" style="font-family: 'Kanit', sans-serif;">
								<i class="menu-icon icon-dashboard"></i>หน้าแรก ( ตรวจสอบ Token )</a>
								</li>
                                <li>
								<a href="?page=sgroup" style="font-family: 'Kanit', sans-serif;">
								<i class="menu-icon icon-dashboard"></i>ปั้มแชร์ ( ลงกลุ่ม )</a>
								</li>
                                <li>
								<a href="?page=sfriend" style="font-family: 'Kanit', sans-serif;">
								<i class="menu-icon icon-dashboard"></i>ปั้มแชร์ ( ลงหน้าเฟสเพื่อน )</a>
								</li>
                            </ul>
                        </div>
                    </div>
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4"><i class=" icon-random"></i><b>Null</b>
                                        <p class="text-muted" style="font-family: 'Kanit', sans-serif;">
                                            Comming Soon</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-user"></i><b style="font-family: 'Kanit', sans-serif;"><?=$bclass->getcount("nodb/db_token.txt");?></b>
                                        <p class="text-muted" style="font-family: 'Kanit', sans-serif;">
                                            Token ในระบบ</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-money"></i><b>Null</b>
                                        <p class="text-muted" style="font-family: 'Kanit', sans-serif;">
                                            Comming Soon</p>
                                    </a>
                                </div>
                            </div>
							<div class="module">
							<div class="module-head">
								<h3 style="text-align:center;font-family: 'Kanit', sans-serif;">ปั้มแชร์ ( ลงกลุ่ม )</h3>
							</div>
							<div class="module-body">
								<div id="alerts"></div>
								<div class="input-prepend">
									<span class="add-on" style="font-family: 'Kanit', sans-serif;">ไอดีโพสต์</span><input class="span8" type="text" id="text_idpost" placeholder="POST ID">       
								</div>
								<a class="btn btn-large btn-danger btn-block" style="font-family: 'Kanit', sans-serif;" id="onclick_sgroup" onClick="sgroup();" data-loading-text="<i class='fa fa-refresh fa-spin' aria-hidden='true'></i> โปรดรอสักครู่ระบบกำลังทำรายการ . . ."><i class="fa fa-share" aria-hidden="true"></i> แชร์</a>
							</div>
						</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
          <div class="container"><a href="https://www.facebook.com/KrisanaSribun"> COPYRIGHT © 2018 ALL SYSTEM BY Krisana Sribun </a></div>
        </div>
        <script src="<?=$baseurl?>/assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="<?=$baseurl?>/assets/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="<?=$baseurl?>/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=$baseurl?>/assets/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="<?=$baseurl?>/assets/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="<?=$baseurl?>/assets/scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?=$baseurl?>/assets/scripts/common.js" type="text/javascript"></script>
        <script src="<?=$baseurl?>/assets/scripts/basdy.js" type="text/javascript"></script>
      
    </body>
