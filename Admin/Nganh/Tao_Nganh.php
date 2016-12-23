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
		if(isset($_POST['txtMaNganh']))
		{
			$sql = "INSERT INTO Nganh(MaNganh, TenNganh, HeDaoTao, SLTaiPhong, DiemMax, DiemMin) VALUES ('".$_POST['txtMaNganh']."', '".$_POST['txtTenNganh']."', ".$_POST['slHeDaoTao'].", ".$_POST['txtSLTaiPhong'].", ".$_POST['txtDiemMax'].", ".$_POST['txtDiemMin'].")";
			
			if($conn->query($sql) === TRUE)
			{
				ConnectDB::disconnect();
				echo "Đã nhập dữ liệu thành công. <a href='./index.php?menu=Nganh'>Nhấp vào đây để vào trang Ngành đào tạo.</a>
<meta http-equiv='refresh' content='1;url=./index.php?menu=Nganh' />";
				exit;
			}
			else
			{
				echo "Nhap du lieu Loi";
			}
			ConnectDB::disconnect();
		}
	}
?>

<div class="row">
    	<!-- Chèn form để xem thông tin tổ hợp môn -->
        <form class="form-horizontal" name="frmTaoToHopMon" method="post" enctype="multipart/form-data">
                <div class="form-group">
    				<label for="txtMaNganh" class="col-sm-2 control-label">Mã ngành: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtMaNganh" placeholder="Mã ngành" required maxlength="11">
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtTenNganh" class="col-sm-2 control-label">Tên ngành: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtTenNganh" placeholder="Tên ngành" required>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="slHeDaoTao" class="col-sm-2 control-label">Hệ đào tạo: </label>
    				<div class="col-sm-5">
	                    <select class="form-control" name="slHeDaoTao">
	                    <?php	
							require_once("../PHP/ConnectDB.php");
							$conn = ConnectDB::connect();
							$sqlHDT = "SELECT HeDaoTao, MoTa FROM HeDT";
							$resutDM = mysqli_query($conn, $sqlHDT);
							if($resutDM->num_rows >0)
							{
								while ($rowMD = $resutDM->fetch_assoc())
								{
									if($row['HeDaoTao'] == $rowMD['HeDaoTao'])
									{
										echo "<option value='".$rowMD['HeDaoTao']."' selected> ".$rowMD['MoTa']."</option>";	
									}
									else
									{
										echo "<option value='".$rowMD['HeDaoTao']."'> ".$rowMD['MoTa']."</option>";										
									}
								}
							}
						?>
                        </select>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtSLTaiPhong" class="col-sm-2 control-label">SL đăng ký tại phòng: </label>
    				<div class="col-sm-5">
      					<input type="number" class="form-control" name="txtSLTaiPhong" placeholder="Số lượng đăng ký tại phòng" value="0" required>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtDiemMax" class="col-sm-2 control-label">Điểm cao nhất: </label>
    				<div class="col-sm-5">
      					<input type="number" class="form-control" name="txtDiemMax" placeholder="Điểm cao nhất" value="0" required>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtDiemMin" class="col-sm-2 control-label">Điểm thấp nhất: </label>
    				<div class="col-sm-5">
      					<input type="number" class="form-control" name="txtDiemMin" placeholder="Điểm thấp nhất" value="0" required>
    				</div>
  				</div>
                <div class="form-group" align="center">
					<button type="submit" class="btn btn-success" name="submit">Tạo</button>
					<a href="Index.php?menu=Nganh"><button type="button" class="btn btn-default">Trở về</button></a>
              	</div>
    		</form>
</div>

