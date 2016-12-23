<?php
	if(isset($_POST['submit']))
	{
		require_once("../PHP/ConnectDB.php");
		$conn = ConnectDB::connect();
		// Insert co so du lieu
		if(isset($_POST['txtTenNganh']))
		{
			$sql="UPDATE Nganh SET MaNganh='".$_POST['txtMaNganhMoi']."' , TenNganh='".$_POST['txtTenNganh']."', HeDaoTao=".$_POST['slHeDaoTao'].", SLTaiPhong=".$_POST['txtSLTaiPhong'].", DiemMax=".$_POST['txtDiemMax'].", DiemMin=".$_POST['txtDiemMin']." WHERE MaNganh = '".$_POST['txtMaNganhCu']."'";
			if($conn->query($sql) === TRUE)
			{
				ConnectDB::disconnect();
				echo "Đã cập nhật dữ liệu thành công. <a href='./index.php?menu=Nganh'>Nhấp vào đây để vào trang Ngành đào tạo.</a>
<meta http-equiv='refresh' content='1;url=./index.php?menu=Nganh' />";
				exit;
			}
			else
			{
				echo "Nhập dữ liệu lỗi";
			}
			ConnectDB::disconnect();	
		}
	}
?>

    <div class="row">
    	<!-- Chèn form để xem thông tin tài khoản -->
        <?php
			require_once("../PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
			$sql = "SELECT * FROM Nganh WHERE MaNganh = '".$_GET['MaNganh']."'";
	
			$resut = mysqli_query($conn, $sql);
			if($resut->num_rows>0)
			{
				$row = $resut->fetch_assoc();
			}
		?>
        <form class="form-horizontal" name="frmSuaTaiKhoan" method="post" enctype="multipart/form-data">
                <input type="hidden" name="txtMaNganhCu" value="<?php echo $_GET['MaNganh']?>"/>
                <div class="form-group">
    				<label for="txtMaNganhMoi" class="col-sm-2 control-label">Mã ngành: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtMaNganhMoi" placeholder="Mã ngành" value="<?php echo $row['MaNganh'];?>" required maxlength="11">
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtTenNganh" class="col-sm-2 control-label">Tên ngành: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtTenNganh" placeholder="Tên ngành" value="<?php echo $row['TenNganh'];?>" required>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="slHeDaoTao" class="col-sm-2 control-label">Hệ đào tạo: </label>
    				<div class="col-sm-5">
	                    <select class="form-control" name="slHeDaoTao">
	                    <?php	
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
      					<input type="number" class="form-control" name="txtSLTaiPhong" placeholder="Số lượng đăng ký tại phòng" value="<?php echo $row['SLTaiPhong'];?>" required>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtDiemMax" class="col-sm-2 control-label">Điểm cao nhất: </label>
    				<div class="col-sm-5">
      					<input type="number" class="form-control" name="txtDiemMax" placeholder="Điểm cao nhất" value="<?php echo $row['DiemMax'];?>" required>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtDiemMin" class="col-sm-2 control-label">Điểm thấp nhất: </label>
    				<div class="col-sm-5">
      					<input type="number" class="form-control" name="txtDiemMin" placeholder="Điểm thấp nhất" value="<?php echo $row['DiemMin'];?>" required>
    				</div>
  				</div>
                <div class="form-group" align="center">
					<button type="submit" class="btn btn-success" name="submit">Sửa</button>
					<a href="Index.php?menu=DotXetTuyen"><button type="button" class="btn btn-default">Trở về</button></a>
              	</div>
    		</form>
</div>