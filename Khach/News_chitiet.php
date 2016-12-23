<html>
<head>
	<title>Tuyển sinh Cao đẳng sư phạm Thừa Thiên Huế</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Meta Responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap core CSS -->
<!--	<script src="asset/js/jquery-2.2.1.min.js" type="text/javascript"> </script>-->
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="asset/bootstrap/js/bootstrap.min.js"></script>-->
  <!--  <script src="asset/js/bootbox.js"></script>-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <link href="../asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/css/menu.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../asset/css/style.css" media="screen" />
	
</head>
<body style="background-color: lightgrey;" >
	<?php
		include("menu_Khach.php");
        //include_once("PHP/define.php");
    ?>
        
<div class="container" style="background-color: whitesmoke;width:1050px; border-radius: 5px;padding-bottom: 20px;">
    <img class="img-thumbnail" src="../asset/img/cdsp_banner.jpg" alt="banner" style="width:100%; height: 200px;margin-top: 10px;margin-bottom:5px;">  
    <br>
   	<div class="row">
	<?php
	require_once("../PHP/ConnectDB.php");
	$conn = ConnectDB::connect();
	$sql = "SELECT * FROM TinTuc WHERE ID = ".$_GET['ID'];
	$resut = mysqli_query($conn, $sql);
	if($resut->num_rows>0)
	{
		$row = $resut->fetch_assoc();
	}
	ConnectDB::disconnect();
	?>
	<div class="col-xs-12">
		<div class="panel panel-primary">
    		<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;"><b><?php echo $row['TieuDe']; ?></b>
	        </div>
    	    <div class="panel-body">
            <?php
				echo "<div align='justify' style='margin-left:10px;margin-right:10px'><p>".$row['NoiDung']."</p></div>";
				echo "<div align='left' style='margin-left:10px;margin-right:10px;font-style:italic'><p>Ngày đăng ".date('d/m/Y',strtotime($row['NgayDang']))."</p></div>";
			?>
				<div style="text-align:right;">
        			<a class="button" href="News_All.php">Trở về</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
 	<?php
	/*	$fileName = isset($_GET['menu']) ? $_GET['menu'].'.php' : 'News.php';
		include('Khach/'.$fileName);
		*/
		include("footer.php");

	?>
</div>

</body>

</html>

