<?php
	/*session_start();
	include_once(realpath(dirname(__DIR__))."/PHP/define.php");
	if(array_key_exists('TenDN',$_SESSION) && array_key_exists('MaPhanQuyen',$_SESSION))
	{
		if($_SESSION['MaPhanQuyen'] != 1)
		{
			header('Location: ../PHP/Login.php');
		}
	}
	else
	{
		header('Location: ../PHP/Login.php');
	}
	*/
	
		
	if(isset($_POST['submit']))
	{
		require_once("../PHP/ConnectDB.php");
		$conn = ConnectDB::connect();
		$date = date('Y-m-d H:i:s',time());
		
		// Insert co so du lieu
		$sqlUpdate = "UPDATE TinTuc SET TieuDe='".$_POST['txtTieuDe']."', NoiDung='".$_POST['txtNoiDung']."', NgayDang='".$date."' WHERE ID = ".$_POST['txtID'];
		
		if(mysqli_query($conn,$sqlUpdate) === TRUE)
			{
				ConnectDB::disconnect();
			echo "Đã cập nhật dữ liệu thành công. <a href='./index.php?menu=News'>Nhấp vào đây để vào trang trang Tin tức.</a>
<meta http-equiv='refresh' content='1;url=./index.php?menu=News' />";
			exit;
			}
			else
			{
				echo "Cap nhat du lieu Loi";
			}
		ConnectDB::disconnect();
	}
	
?>

    <div class="row">
    	<!-- Chèn form để xem thông tin tài khoản -->
        <?php
			require_once("../PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
			$sql = "SELECT * FROM TinTuc WHERE ID = ".$_GET['ID'];
			
			$resut = mysqli_query($conn, $sql);
			
			if($resut->num_rows>0)
			{
				$row = $resut->fetch_assoc();
			}
		?>
        <form class="form-horizontal" name="frmSuaTaiKhoan" method="post" enctype="multipart/form-data">
                <div class="form-group">
    				<div class="col-sm-9">
      					<input type="hidden" class="form-control" name="txtID" value="<?php echo $_GET['ID']?>">
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtTieuDe" class="col-sm-2 control-label">Tiêu đề: </label>
    				<div class="col-sm-9">
      					<input type="text" class="form-control" name="txtTieuDe" placeholder="Tiêu đề" value="<?php echo $row['TieuDe']; ?>" required>
    				</div>
  				</div>
				<div class="form-group">
    				<label for="txtNoiDung" class="col-sm-2 control-label">Nội dung: </label>
    				<div class="col-sm-9">
                    	<!--Thẻ CKEDITOR-->
                    	<textarea id="txtNoiDung" class="ckeditor" name="txtNoiDung" placeholder="Nội dung"><?php echo $row['NoiDung']; ?></textarea>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtNgayDang" class="col-sm-2 control-label">Ngày đăng: </label>
    				<div class="col-sm-5">
      					<input type="text" disabled class="form-control" name="txtNgayDang" placeholder="Ngày đăng" value="<?php echo $row['NgayDang']; ?>">
    				</div>
  				</div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="submit">Sửa</button>
                      <a href="Index.php?menu=News"><button type="button" class="btn btn-default">Trở về</button></a>
                    </div>
              	</div>
    		</form>
</div>

