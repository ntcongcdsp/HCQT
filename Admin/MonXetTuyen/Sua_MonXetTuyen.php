<?php
	if(isset($_POST['submit']))
	{
		require_once("../PHP/ConnectDB.php");
		$conn = ConnectDB::connect();
		// Insert co so du lieu
		$sql = "UPDATE MonXetTuyen SET MaToHop='".$_POST['slMaToHop']."' WHERE MaNganh = '".$_POST['txtMaNganhCu']."' AND MaToHop = '".$_POST['txtMaToHopCu']."'";
		if($conn->query($sql) === TRUE)
		{
			ConnectDB::disconnect();
			echo "Đã cập nhật dữ liệu thành công. <a href='./index.php?menu=MonXetTuyen'>Nhấp vào đây để vào trang Ngành - Môn xét tuyển.</a>
<meta http-equiv='refresh' content='1;url=./index.php?menu=MonXetTuyen' />";
			exit;
		}
		else
		{
			echo "Nhập dữ liệu lỗi";
		}
		ConnectDB::disconnect();	
	}
?>

    <div class="row">
    	<!-- Chèn form để xem thông tin tài khoản -->
        <?php
			require_once("../PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
			$sql = "SELECT A.MaNganh, TenNganh, MaToHop FROM MonXetTuyen AS A INNER JOIN Nganh AS B ON A.MaNganh = B.MaNganh WHERE A.MaNganh = '".$_GET['MaNganh']."' AND MaToHop = '".$_GET['MaToHop']."'";
	
			$resut = mysqli_query($conn, $sql);
			if($resut->num_rows>0)
			{
				$row = $resut->fetch_assoc();
			}
		?>
        <form class="form-horizontal" name="frmSuaTaiKhoan" method="post" enctype="multipart/form-data">
                <input type="hidden" name="txtMaToHopCu" value="<?php echo $_GET['MaToHop']?>"/>
                <input type="hidden" name="txtMaNganhCu" value="<?php echo $_GET['MaNganh']?>"/>
                <div class="form-group">
    				<label for="txtMaNganh" class="col-sm-2 control-label">Mã ngành xét tuyển: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtMaNganh" placeholder="Mã ngành xét tuyển" disabled value="<?php echo $row['MaNganh'];?>" />
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtTenNganh" class="col-sm-2 control-label">Tên Ngành xét tuyển: </label>
    				<div class="col-sm-5">
     	               <input type="text" class="form-control" name="txtTenNganh" placeholder="Tên ngành xét tuyển" disabled value="<?php echo $row['TenNganh'];?>" />
	                    <!--<select class="form-control" name="slMaNganh">
	                    <?php	
							/*$sqlHDT = "SELECT TenNganh FROM Nganh WHERE MaNganh = '".$row['MaNganh']."'";
							$resutDM = mysqli_query($conn, $sqlHDT);
							if($resutDM->num_rows >0)
							{
								while ($rowMD = $resutDM->fetch_assoc())
								{
									if($row['MaNganh'] == $rowMD['MaNganh'])
									{
										echo "<option value='".$rowMD['MaNganh']."' selected> ".$rowMD['TenNganh']."</option>";	
									}
									else
									{
										echo "<option value='".$rowMD['MaNganh']."'> ".$rowMD['TenNganh']."</option>";										
									}
								}
							}*/
						?>
                        </select>-->
    				</div>
  				</div>
                <div class="form-group">
    				<label for="slMaToHop" class="col-sm-2 control-label">Tổ hợp môn xét tuyển: </label>
    				<div class="col-sm-5">
	                    <select class="form-control" name="slMaToHop">
	                    <?php	
							$sqlHDT = "SELECT * FROM ToHopMon";
							$resutDM = mysqli_query($conn, $sqlHDT);
							if($resutDM->num_rows >0)
							{
								while ($rowMD = $resutDM->fetch_assoc())
								{
									if($row['MaToHop'] == $rowMD['MaToHop'])
									{
										echo "<option value='".$rowMD['MaToHop']."' selected> ".$rowMD['MaToHop']." : ".$rowMD['Mon1']."; ".$rowMD['Mon2']."; ".$rowMD['Mon3']."</option>";	
									}
									else
									{
										echo "<option value='".$rowMD['MaToHop']."'> ".$rowMD['MaToHop']." : ".$rowMD['Mon1']."; ".$rowMD['Mon2']."; ".$rowMD['Mon3']."</option>";										
									}
								}
							}
						?>
                        </select>
    				</div>
  				</div>

                <div class="form-group" align="center">
					<button type="submit" class="btn btn-success" name="submit">Sửa</button>
					<a href="Index.php?menu=MonXetTuyen"><button type="button" class="btn btn-default">Trở về</button></a>
              	</div>
    		</form>
</div>
