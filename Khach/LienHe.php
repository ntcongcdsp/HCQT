<?php
	if(isset($_POST['submit']))
	{
		$hoten = $_POST['txtHoTen'];
		$soDT = $_POST['txtSoDT'];
		$hoi = $_POST['txtHoi'];
		
		$NgayHoi = date('Y-m-d H:i:s',time());
		
		require_once("../PHP/ConnectDB.php");
		$conn = ConnectDB::connect();
		// Insert co so du lieu
			
		$sql = "INSERT INTO LienHe(HoTen, SoDT, Hoi, NgayHoi) VALUES ('$hoten', '$soDT', '$hoi', '$NgayHoi' )";		
			if($conn->query($sql) === TRUE)
			{
				ConnectDB::disconnect();
				echo "<h3>Bạn đã gửi liên hệ đến Phòng Hành chính - Quản trị thành công. </h3>Phòng sẽ sớm liên lạc với bạn <meta http-equiv='refresh' content='1;url=../index.php' />";
				exit;
			}
			else
			{
				echo "Nhap du lieu Loi";
			}
			ConnectDB::disconnect();
	}
?>
<html>
<head>
	<title>Phòng Hành chính - Quản trị</title>
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
    		<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;"><b>LIÊN HỆ</b>
	        </div>
    	    <div class="panel-body">
				<div class="row" style="position:relative;right:20px;">
                	<div class="col-sm-12" align="center">
                        <h3 style="color:#F00">THÔNG TIN LIÊN HỆ</h3>
					</div>
                	<form class="form-horizontal" name="frmLienHe" method="post" enctype="multipart/form-data">
                	<div class="form-group">
    					<label for="txtHoTen" class="col-sm-4 control-label">Họ và tên người liên hệ: </label>
    					<div class="col-sm-5">
      						<input type="text" class="form-control" id="txtHoTen" name="txtHoTen" placeholder="Họ tên người liên hệ" required>
    					</div>
  					</div>
  					
                    <div class="form-group">
    					<label for="txtSoDT" class="col-sm-4 control-label">Số điện thoại: </label>
    					<div class="col-sm-5">
      						<input type="number" class="form-control" name="txtSoDT" id="txtSoDT" placeholder="Số điện thoại" required>
    					</div>
  					</div>
  					<div class="form-group">
    					<label for="txtHoi" class="col-sm-4 control-label">Nội dung liên hệ: </label>
    					<div class="col-sm-5">
    						<textarea class="form-control" rows="4" id="txtHoi" name="txtHoi" placeholder="Nội dung liên hệ" required></textarea>
    					</div>
  					</div>
  					                          
                    <div class="form-group" align="center">
                    	<button type="submit" class="btn btn-success" id="submit" name="submit" style="margin-right:10px">Liên hệ</button>
                    </div>
                </form>
                </div>
				<div style="text-align:right;">
        			<a class="button" href="../index.php">Về trang chủ</a>
				</div>
			</div>
		</div>
	</div>
</div>

   	<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
    		<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;"><b>CÁC LIÊN HỆ ĐÃ ĐƯỢC GIẢI ĐÁP</b>
	        </div>
    	    <div class="panel-body">
				<div class="row" style="position:relative;">
                	<?php
						include_once("../PHP/ConnectDB.php");
						$conn = ConnectDB::connect();
						$sql = "SELECT * FROM LienHe WHERE Dap <> '' ORDER BY ID DESC";
						$resut = mysqli_query($conn, $sql);

				        if($resut->num_rows >0)
				        {
				        	$i=0;
				        	echo '<table class="table table-bordered col-xs-12" >';
				        		echo "<tr>";
				        			echo '<th style="text-align:center;vertical-align:middle" width="2%" class="info">STT</th>';
				        			echo '<th style="text-align:center;vertical-align:middle" width="44%" class="info">Hỏi</th>';
				        			echo '<th style="text-align:center;vertical-align:middle" width="44%" class="info">Đáp</th>';
				        		echo "</tr>";
				          	while ($row = $resut->fetch_assoc())
				            {
				            	$i++;
				            	echo "<tr>";
				            	echo '<td style="text-align:center;vertical-align:middle">'. $i. '</td>';
				            	echo '<td style="text-align:justify;vertical-align:middle;wordwrap(true);">'.$row['Hoi']."</td>";
				            	echo '<td style="text-align:justify;vertical-align:middlewordwrap(true);">'.$row['Dap']."</td>";
				            	echo "</tr>";
							}
							echo "</table>";
						}
					?>
                </div>
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