<html>
<head>
	<title>Tuyển sinh Cao đẳng sư phạm Thừa Thiên Huế</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Meta Responsive -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
	<div class="col-xs-12">
		<div class="panel panel-primary">
    		<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;"><b>TIN TỨC</b>
	        </div>
    	    <div class="panel-body">
				<ul>
                <?php
					include_once("../PHP/define.php");
					require_once("../PHP/ConnectDB.php");
					$conn = ConnectDB::connect();
					
					//$sql = "SELECT * FROM TinTuc WHERE DoUuTien <> 99 ORDER BY DoUuTien DESC";
					$sql = "SELECT * FROM TinTuc ORDER BY DoUuTien DESC";
	
					$result = mysqli_query($conn, $sql);
					if($result->num_rows > 0)
					{
						while($row = $result->fetch_assoc())
						{
							echo "<li class='findlost'><a href='".BASE_URL_Khach."News_chitiet.php?ID=".$row['ID']."'>".$row['TieuDe']."</a> (".date('d/m/Y',strtotime($row['NgayDang'])).")</li>";
						}
					}
					ConnectDB::disconnect();
				?>
                </ul>
				<div style="text-align:right;">
        			<a class="button" href="../index.php">Về trang chủ</a>
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