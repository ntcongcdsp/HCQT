
<html>
<head>
	<title>Tuyển sinh Cao đẳng sư phạm Thừa Thiên Huế</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Meta Responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap core CSS -->
	<script src="../asset/js/jquery-2.2.1.min.js" type="text/javascript"> </script>
    <script src="../asset/bootstrap/js/bootstrap.min.js" type="text/javascript"> </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    
    <link href="../asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/menu.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../asset/css/style.css" media="screen" />
    <!--<link rel="stylesheet" type="text/css" href="../asset/css/demo.css" />-->
    <link rel="stylesheet" type="text/css" href="../asset/css/style6.css" />
    <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
    <!-- Chen Validation -->
    <script src="../asset/js/jquery.validate.js"></script>
    <!-- Chen ckeditor -->
    <script type="text/javascript" src="../asset/ckeditor/ckeditor.js"></script>
</head>
  <body style="background-color: lightgrey;">
      <?php
          include("menu_Admin.php");
          include_once("../PHP/define.php");
      ?>
          
  <div class="container" style="background-color: whitesmoke; width:950px; border-radius: 5px;padding-bottom: 20px;">
      <?php
          $fileName = isset($_GET['menu']) ? $_GET['menu'].'.php' : 'AdminPanel.php';
          include($fileName);
      ?>
      <div class="row" style="height: 50px; border: 1px solid grey;border-radius:5px;text-align:center;margin-top:10px">
          Bản quyền thuộc về Nguyễn Thành Công - phòng Đào tạo QLKH - Trường Cao đẳng Sư phạm Thừa Thiên Huế
      </div>
  </div>
  </body>
</html>
