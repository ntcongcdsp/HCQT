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
	
	if(isset($_POST['submit']))
	{
		require_once("../PHP/ConnectDB.php");
		$conn = ConnectDB::connect();
		// Insert co so du lieu
		if(isset($_POST['txtMaToHop']))
			$sql = "INSERT INTO ToHopMon(MaToHop, Mon1, Mon2, Mon3) VALUES ('".$_POST['txtMaToHop']."','".$_POST['txtMon1']."','".$_POST['txtMon2']."', '".$_POST['txtMon3']."')";
		if($conn->query($sql) === TRUE)
		{
			ConnectDB::disconnect();
			echo "Đã nhập dữ liệu thành công. <a href='./index.php?menu=ToHopMon'>Nhấp vào đây để vào trang Đợt xét tuyển.</a>
<meta http-equiv='refresh' content='1;url=./index.php?menu=ToHopMon' />";
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
    	<!-- Chèn form để xem thông tin tổ hợp môn -->
        <form class="form-horizontal" name="frmTaoToHopMon" method="post" enctype="multipart/form-data">
                <div class="form-group">
    				<label for="txtMaToHop" class="col-sm-2 control-label">Mã tổ hợp môn: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtMaToHop" placeholder="Mã tổ hợp môn" required>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtMon1" class="col-sm-2 control-label">Môn 1: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtMon1" placeholder="Môn 1" required>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtMon2" class="col-sm-2 control-label">Môn 2: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtMon2" placeholder="Môn 2" required >
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtMon3" class="col-sm-2 control-label">Môn 3: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtMon3" placeholder="Môn 3">
    				</div>
  				</div>
                <div class="form-group" align="center">
					<button type="submit" class="btn btn-success" name="submit">Tạo</button>
					<a href="Index.php?menu=ToHopMon"><button type="button" class="btn btn-default">Trở về</button></a>
              	</div>
    		</form>
</div>
