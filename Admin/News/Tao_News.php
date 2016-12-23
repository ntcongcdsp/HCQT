<?php
	/*session_start();
	include_once(realpath(dirname(__DIR__))."/PHP/define.php");
	if(array_key_exists('TenDN',$_SESSION) && array_key_exists('MaPhanQuyen',$_SESSION))
	{
		if($_SESSION['MaPhanQuyen'] != NHOM_QUAN_TRI)
		{
			header('Location: ../PHP/Login.php');
		}
	}
	else
	{
		header('Location: ../PHP/Login.php');
	}
	*/
	
	$date = date('Y-m-d H:i:s',time());
	
	if(isset($_POST['submit']))
	{
		require_once("../PHP/ConnectDB.php");
		$conn = ConnectDB::connect();
		// Insert co so du lieu
		$sqlInsert = "INSERT INTO TinTuc(TieuDe, NoiDung, NgayDang) VALUES ('".$_POST['txtTieuDe']."', '".$_POST['txtNoiDung']."', '".$date."')";
		
		if(mysqli_query($conn,$sqlInsert) === TRUE)
			{
				ConnectDB::disconnect();
			echo "Đã nhập dữ liệu thành công. <a href='./index.php?menu=News'>Nhấp vào đây để vào trang Tin tức.</a>
<meta http-equiv='refresh' content='1;url=./index.php?menu=News' />";
			exit;
		}
		else
		{
			echo "Nhap du lieu Loi";
		}
		ConnectDB::disconnect();
	}
	
?>
    <div class="row">

        <form class="form-horizontal" name="frmDangTin" method="post" enctype="multipart/form-data">
                <div class="form-group">
    				<label for="txtTieuDe" class="col-sm-2 control-label">Tiêu đề: </label>
    				<div class="col-sm-9">
      					<input type="text" class="form-control" name="txtTieuDe" placeholder="Tiêu đề" required>
    				</div>
  				</div>
				<div class="form-group">
    				<label for="txtNoiDung" class="col-sm-2 control-label">Nội dung: </label>
    				<div class="col-sm-9">
                    	<!--Thẻ CKEDITOR-->
                    	<textarea style="width:100%" class="ckeditor" id="txtNoiDung" name="txtNoiDung" placeholder="Nội dung" required></textarea>
    				</div>
  				</div>        
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success" name="submit">Tạo</button>
                      <a href="Index.php?menu=News"><button type="button" class="btn btn-default">Trở về</button></a>
                    </div>
              	</div>
    		</form>
</div>

