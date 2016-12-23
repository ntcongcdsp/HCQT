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
		$sql= "INSERT INTO MonXetTuyen (MaNganh, MaToHop) VALUES ('".$_POST['slMaNganh']."','".$_POST['slMaToHop']."')";

		if($conn->query($sql) === TRUE)
		{
			ConnectDB::disconnect();
			echo "Đã nhập dữ liệu thành công. <a href='./index.php?menu=MonXetTuyen'>Nhấp vào đây để vào trang Ngành - Môn xét tuyển.</a>
<meta http-equiv='refresh' content='1;url=./index.php?menu=MonXetTuyen' />";
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
    	<!-- Chèn form để xem thông tin tài khoản -->
        <form class="form-horizontal" name="frmTaoDotXetTuyen" method="post" enctype="multipart/form-data">
			<div class="form-group">
    			<label for="slMaNganh" class="col-sm-2 control-label">Ngành xét tuyển: </label>
    			<div class="col-sm-5">
					<select class="form-control" name="slMaNganh">
	                <?php	
						require_once("../PHP/ConnectDB.php");
						$conn = ConnectDB::connect();
						$sqlHDT = "SELECT * FROM Nganh";
						$resutDM = mysqli_query($conn, $sqlHDT);
						if($resutDM->num_rows >0)
						{
							while ($rowMD = $resutDM->fetch_assoc())
							{
								echo "<option value='".$rowMD['MaNganh']."'> ".$rowMD['MaNganh']." - ".$rowMD['TenNganh']."</option>";										
							}
						}
					?>
                    </select>
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
								echo "<option value='".$rowMD['MaToHop']."'> ".$rowMD['MaToHop']." : ".$rowMD['Mon1']."; ".$rowMD['Mon2']."; ".$rowMD['Mon3']."</option>";									
							}
						}
					?>
                    </select>
    				</div>
  				</div>
                <div class="form-group" align="center">
					<button type="submit" class="btn btn-success" name="submit">Tạo</button>
					<a href="Index.php?menu=MonXetTuyen"><button type="button" class="btn btn-default">Trở về</button></a>
              	</div>
    		</form>
</div>

