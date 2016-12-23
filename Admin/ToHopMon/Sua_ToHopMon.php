<?php
	if(isset($_POST['submit']))
	{
		if(isset($_POST['txtMaToHopMoi']))
		{
			require_once("../PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
			// Insert co so du lieu
		
			$sql = "UPDATE ToHopMon SET MaToHop='".$_POST['txtMaToHopMoi']."', Mon1 = '".$_POST['txtMon1']."', Mon2 = '".$_POST['txtMon2']."',Mon3='".$_POST['txtMon3']."' WHERE MaToHop = '".$_POST['txtMaToHopCu']."'";
			if($conn->query($sql) === TRUE)
			{
				ConnectDB::disconnect();
				echo "Đã cập nhật dữ liệu thành công. <a href='./index.php?menu=ToHopMon'>Nhấp vào đây để vào trang Đợt xét tuyển.</a>
<meta http-equiv='refresh' content='1;url=./index.php?menu=ToHopMon' />";
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
			$sql = "SELECT * FROM ToHopMon WHERE MaToHop = '".$_GET['MaToHop']."'";
	
			$resut = mysqli_query($conn, $sql);
			if($resut->num_rows>0)
			{
				$row = $resut->fetch_assoc();
			}
		?>
        <form class="form-horizontal" name="frmSuaToHopMon" method="post" enctype="multipart/form-data">
                <input type="hidden" name="txtMaToHopCu" value="<?php echo $_GET['MaToHop']?>"/>
                <div class="form-group">
    				<label for="txtMaToHopMoi" class="col-sm-2 control-label">Mã tổ hợp môn: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtMaToHopMoi" placeholder="Mã tổ hợp môn" value="<?php echo $row['MaToHop'];?>" required>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtMon1" class="col-sm-2 control-label">Môn 1: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtMon1" placeholder="Môn 1" value="<?php echo $row['Mon1'];?>" required>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtMon2" class="col-sm-2 control-label">Môn 2: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtMon2" placeholder="Môn 2" value="<?php echo $row['Mon2'];?>" required>
    				</div>
  				</div>
                <div class="form-group">
    				<label for="txtMon3" class="col-sm-2 control-label">Môn 3: </label>
    				<div class="col-sm-5">
      					<input type="text" class="form-control" name="txtMon3" placeholder="Môn 3" value="<?php echo $row['Mon3'];?>">
    				</div>
  				</div>
                <div class="form-group" align="center">
					<button type="submit" class="btn btn-success" name="submit">Sửa</button>
					<a href="Index.php?menu=ToHopMon"><button type="button" class="btn btn-default">Trở về</button></a>
              	</div>
    		</form>
</div>