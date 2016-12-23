<?php
	session_start();
	/*include_once(realpath(dirname(__DIR__))."/PHP/define.php");
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
	/*session_start();
	$ho = "";
	$ten = "";
	$soCMND = "";
	$ngaySinh = "";
	$gioiTinh = "";
	$diaChiThuongTru = "";
	$maTinh = "";
	$maHuyen = "";
	$maXa  = "";
	$diaChiNhanGB = "";
	$soDT = "";
	$email = "";
	$lop12 = "";
	$maDoiTuong = "";
	$maDoiTuongUTXT = "";
	$monDoatGiai = "";
	$maTruongKhac = "";
	$tenTruongKhac = "";
	$maNganhHB = "";
	$toHopMonHB = "";
	$mon1 = 0.0;
	$mon2 = 0.0;
	$mon3 = 0.0;
	
	if(isset($_POST['submit']))
	{
		$ho = $_POST['txtHo'];
		$ten = $_POST['txtTen'];
		$soCMND = $_POST['txtSoCMND'];
		$ngaySinh = $_POST['txtNgaySinh'];
		$gioiTinh = $_POST['slGioiTinh'];
		$diaChiThuongTru = $_POST['txtDiaChiThuongTru'];
		$maTinh = $_POST['slTinh'];
		$maHuyen = $_POST['slHuyen'];
		$maXa  = isset($_POST['slXa']) ? $_POST['slXa'] : '00';
		$diaChiNhanGB = $_POST['txtDiaChiNhanGB'];
		$soDT = $_POST['txtSoDT'];
		$email = $_POST['txtEmail'];
		$lop12 = isset($_POST['slLop12']) ? $_POST['slLop12']: '00';
		$maDoiTuong = $_POST['slDoiTuong'];
		$maDoiTuongUTXT = $_POST['slDoiTuongUTXT'];
		$monDoatGiai = isset($_POST['txtMonDoatGiai']) ? $_POST['txtMonDoatGiai'] : '';
		$maTruongKhac = isset($_POST['txtMaTruongKhac']) ? $_POST['txtMaTruongKhac'] : '';
		$tenTruongKhac = isset($_POST['txtTenTruongKhac']) ? $_POST['txtTenTruongKhac'] : '';
		$maNganhHB = $_POST['slNganhHB'];
		$toHopMonHB = $_POST['slToHopMonHB'];
		$mon1 = $_POST['txtMon1'];
		$mon2 = $_POST['txtMon2'];
		$mon3 = $_POST['txtMon3'];
		
		$NgayDK = date('Y-m-d H:i:s',time());
		
		if($_POST['txtMaBaoVe'] == $_SESSION['security_code'])
		{
			require_once("/PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
			// Insert co so du lieu
			
			$sql = "START TRANSACTION;
				INSERT INTO thisinh(Ho, Ten, SoCMND, NgaySinh, GioiTinh, DiaChiThuongTru, MaTinh, MaHuyen, MaXa, DiaChiNhanGB, SoDT, Email, Lop12, MaDoiTuong, MaDoiTuongUTXT, MonDoatGiai, MaTruongKhac, TenTruongKhac, NgayDK) VALUES ('$ho', '$ten', $soCMND, '$ngaySinh', $gioiTinh, '$diaChiThuongTru', '$maTinh', '$maHuyen', '$maXa', '$diaChiNhanGB', '$soDT', '$email', '$lop12', '$maDoiTuong', '$maDoiTuongUTXT', '$monDoatGiai', '$maTruongKhac', '$tenTruongKhac', '$NgayDK' ); 
				INSERT INTO dangkyhb(MaTS, MaNganh, MaToHop, DM1, DM2, DM3) VALUES (last_insert_id(),'$maNganhHB','$toHopMonHB', $mon1, $mon2, $mon3); 
				COMMIT;";
			
			if($conn->multi_query($sql) === TRUE)
			{
				ConnectDB::disconnect();
				echo "Đã đăng ký xét tuyển Trường cao đẳng sư phạm Thừa Thiên Huế thành công. <a href='index.php?menu=CaoDang_HoanThanhDK'>Nhấp vào đây để vào trang hoàn thành các thủ tục xét tuyển.</a>
			<meta http-equiv='refresh' content='1;url=index.php?menu=CaoDang_HoanThanhDK' />";
				exit;
			}
			else
			{
				echo "Nhap du lieu Loi";
			}
			ConnectDB::disconnect();
		}
	}*/
?>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
    		<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;">
            	<b>ĐIỀU CHỈNH THÔNG TIN THÍ SINH ĐĂNG KÝ XÉT TUYỂN</b>          
	        </div>
    	    <div class="panel-body">
				<div class="row" style="position:relative;right:20px;">
                    <?php
						require_once("/PHP/ConnectDB.php");
						$conn = ConnectDB::connect();
						$sql = "SELECT * FROM ThiSinh WHERE MaTS = ".$_SESSION['MaTS'];
						$resut = mysqli_query($conn, $sql);
						
						if($resut->num_rows>0)
						{
							$row = $resut->fetch_assoc();
						}
					?>

                        <div class="col-sm-12" align="center">
                            <h3 style="color:#F00">THÔNG TIN THÍ SINH</h3>
                        </div>
                        <form class="form-horizontal" name="frmDieuChinh" id="frmDieuChinh" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="txtHo" class="col-sm-4 control-label">Họ và tên thí sinh: </label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="txtHo" name="txtHo" placeholder="Họ của thí sinh" required value="<?php echo isset($row['Ho']) ? $row['Ho'] : ''; ?>">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="txtTen" name="txtTen" placeholder="Tên của thí sinh" required value="<?php echo isset($row['Ten']) ? $row['Ten'] : '';?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slGioiTinh" class="col-sm-4 control-label">Giới tính: </label>
                                <div class="col-sm-2">
                                    <select class="form-control" name="slGioiTinh" id="slGioiTinh">
                                        <?php
											if($row['GioiTinh'] == 0)
											{
												echo '<option value="0" selected> Nam </option>';
                                        		echo '<option value="1"> Nữ </option>';
											}
											else
											{
												echo '<option value="0" > Nam </option>';
                                        		echo '<option value="1" selected> Nữ </option>';
											}
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtNgaySinh" class="col-sm-4 control-label">Ngày, tháng, năm sinh: </label>
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" name="txtNgaySinh" id="txtNgaySinh" placeholder="Ngày, tháng năm sinh của thí sinh" required value="<?php echo isset($row['NgaySinh']) ? $row['NgaySinh'] : ''; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtSoCMND" class="col-sm-4 control-label">Số CMND (như hồ sơ đăng ký dự thi): </label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="txtSoCMND" id="txtSoCMND" placeholder="Số CMND (như hồ sơ đăng ký dự thi" required maxlength="11" value="<?php echo isset($row['SoCMND']) ? $row['SoCMND'] : ''; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtdiaChiThuongTru" class="col-sm-4 control-label">Hộ khẩu thường trú: </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="txtDiaChiThuongTru" id="txtDiaChiThuongTru" placeholder="Hộ khẩu thường trú" required value="<?php echo isset($row['DiaChiThuongTru']) ? $row['DiaChiThuongTru'] : ''; ?>">
                                    <table width="100%">
                                        <tr>
                                            <td width="30%">
                                                <label for="slTinh" style="font-size:14px;" >Mã tỉnh (thành phố): </label>
                                                <select class="form-control" name="slTinh" id="slTinh">
                                                    <option value="">--Chọn Tỉnh (T.Phố)--</option>
                                                    <?php	
                                                        require_once("/PHP/ConnectDB.php");
                                                        $conn = ConnectDB::connect();
                                                        $sql = "SELECT * FROM Tinh";
                                                        $resut = mysqli_query($conn, $sql);
                                                        if($resut->num_rows >0)
                                                        {
                                                            while ($rowMT = $resut->fetch_assoc())
                                                            {
                                                                if($row['MaTinh'] == $rowMT['MaTinh'])
                                                                    echo "<option value='".$rowMT['MaTinh']."' selected> (".$rowMT['MaTinh'].") ".$rowMT['TenTinh']."</option>";										
                                                                else
                                                                    echo "<option value='".$rowMT['MaTinh']."'> (".$rowMT['MaTinh'].") ".$rowMT['TenTinh']."</option>";										
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                            <td width="30%">
                                                <label for="slHuyen" style="font-size:14px" >Mã huyện (quận): </label>
                                                <select class="form-control" name="slHuyen" id="slHuyen">
                                                    <option value="">--Chọn Huyện (Quận)--</option>
                                                    <?php	
                                                        require_once("/PHP/ConnectDB.php");
                                                        $conn = ConnectDB::connect();
                                                        $sql = "SELECT * FROM Huyen";
                                                        $resut = mysqli_query($conn, $sql);
                                                        if($resut->num_rows >0)
                                                        {
                                                            while ($rowMT = $resut->fetch_assoc())
                                                            {
                                                                if($row['MaHuyen'] == $rowMT['MaHuyen'])
                                                                    echo "<option value='".$rowMT['MaHuyen']."' selected> (".$rowMT['MaHuyen'].") ".$rowMT['TenHuyen']."</option>";
                                                                else
                                                                    echo "<option value='".$rowMT['MaHuyen']."'> (".$rowMT['MaHuyen'].") ".$rowMT['TenHuyen']."</option>";																
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                            <td width="30%">
                                                <label for="slXa" style="font-size:14px" >Mã xã (phường): </label>
                                                <select class="form-control" name="slXa" id="slXa">
                                                    <option value="">--Chọn Xã (Phường)--</option>
                                                    <?php	
                                                        require_once("/PHP/ConnectDB.php");
                                                        $conn = ConnectDB::connect();
                                                        $sql = "SELECT * FROM Xa";
                                                        $resut = mysqli_query($conn, $sql);
                                                        if($resut->num_rows >0)
                                                        {
                                                            while ($rowMT = $resut->fetch_assoc())
                                                            {
                                                                if($row['MaXa'] == $rowMT['MaXa'])
                                                                    echo "<option value='".$rowMT['MaXa']."' selected> (".$rowMT['MaXa'].") ".$rowMT['TenHuyen']."</option>";
                                                                else
                                                                    echo "<option value='".$rowMT['MaXa']."'> (".$rowMT['MaXa'].") ".$rowMT['TenHuyen']."</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtDiaChiNhanGB" class="col-sm-4 control-label">Địa chỉ nhận giấy báo trúng tuyển: </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="txtDiaChiNhanGB" id="txtDiaChiNhanGB" placeholder="Địa chỉ nhận giấy báo trúng tuyển" required value="<?php echo isset($row['DiaChiNhanGB']) ? $row['DiaChiNhanGB'] : ''; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtSoDT" class="col-sm-4 control-label">Số điện thoại: </label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control" name="txtSoDT" id="txtSoDT" placeholder="Số điện thoại" required value="<?php echo isset($row['SoDT']) ? $row['SoDT'] : ''; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtEmail" class="col-sm-4 control-label">Email: </label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Email" value="<?php echo isset($row['Email']) ? $row['Email'] : ''; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slLop12" class="col-sm-4 control-label">Nơi tốt nghiệp THPT: </label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="slLop12" id="slLop12">
                                    <?php	
                                        require_once("/PHP/ConnectDB.php");
                                        $conn = ConnectDB::connect();
                                        $sql = "SELECT * FROM THPT";
                                        $resut = mysqli_query($conn, $sql);
                                        if($resut->num_rows >0)
                                        {
                                            while ($row12 = $resut->fetch_assoc())
                                            {
                                                if($row12['MaTruong'] == $row['Lop12'])
                                                    echo "<option value='".$row12['MaTruong']."' selected> ".$row12['TenTruong']."(Khu vực: ".$row12['KhuVuc'].")</option>";								else
                                                    echo "<option value='".$row12['MaTruong']."'> ".$row12['TenTruong']."(Khu vực: ".$row12['KhuVuc'].")</option>";										
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slDoiTuong" class="col-sm-4 control-label">Đối tượng ưu tiên tuyển sinh: </label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="slDoiTuong" id="slDoiTuong">
                                    <?php	
                                        require_once("/PHP/ConnectDB.php");
                                        $conn = ConnectDB::connect();
                                        $sql = "SELECT * FROM DoiTuong ORDER BY MaDoiTuong ASC";
                                        $resut = mysqli_query($conn, $sql);
                                        if($resut->num_rows >0)
                                        {
                                            while ($rowDT = $resut->fetch_assoc())
                                            {
                                                if($rowDT['MaDoiTuong'] == $row['MaDoiTuong'])
                                                    echo "<option value='".$rowDT['MaDoiTuong']."' selected> ".$rowDT['MaDoiTuong']." - ".$rowDT['DienGiai']."</option>";
                                                else
                                                    echo "<option value='".$rowDT['MaDoiTuong']."'> ".$rowDT['MaDoiTuong']." - ".$rowDT['DienGiai']."</option>";										
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slDoiTuongUTXT" class="col-sm-4 control-label">Diện ưu tiên xét tuyển: </label>
                                <div class="col-sm-7">
                                    <select class="form-control" name="slDoiTuongUTXT" id="slDoiTuongUTXT">
                                    <?php	
                                        require_once("/PHP/ConnectDB.php");
                                        $conn = ConnectDB::connect();
                                        $sql = "SELECT * FROM DoiTuongUTXT ORDER BY MaDoiTuongUTXT ASC";
                                        $resut = mysqli_query($conn, $sql);
                                        if($resut->num_rows >0)
                                        {
                                            while ($rowUTXT = $resut->fetch_assoc())
                                            {
                                                if($rowUTXT['MaDoiTuongUTXT'] == $row['MaDoiTuongUTXT'])
                                                    echo "<option value='".$rowUTXT['MaDoiTuongUTXT']."' selected> ".$rowUTXT['MaDoiTuongUTXT']." - ".$rowUTXT['DienGiai']."</option>";									
                                                else
                                                    echo "<option value='".$rowUTXT['MaDoiTuongUTXT']."'> ".$rowUTXT['MaDoiTuongUTXT']." - ".$rowUTXT['DienGiai']."</option>";										
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="MonDoatGiai">
                                <label for="txtMonDoatGiai" class="col-sm-4 control-label">Môn đoạt giải: </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="txtMonDoatGiai" id="txtMonDoatGiai" placeholder="Môn đoạt giải" value="<?php echo isset($row['MonDoatGiai']) ? $row['MonDoatGiai'] : '';  ?>" >
                                </div>
                            </div>
                                                   
                            <div class="form-group" id="TruongKhac">
                                <label for="txtTruongKhac" class="col-sm-4 control-label">Mã trường, Tên trường: </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="txtMaTruongKhac" id="txtMaTruongKhac" placeholder="Mã trường" value="<?php echo isset($row['MaTruongKhac']) ? $row['MaTruongKhac'] : '';  ?>">
                                </div>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="txtTenTruongKhac" id="txtTenTruongKhac"  placeholder="Tên trường" value="<?php echo isset($row['TenTruongKhac']) ? $row['TenTruongKhac'] : '';  ?>">
                                </div>
                            </div>
                            
                            <!-- Đăng ký xét tuyển vào Trường -->
                            <div class="col-sm-12" align="center">
                                <h3 style="color:#F00">NGUYỆN VỌNG ĐĂNG KÝ</h3>
                            </div>
                            
                            <!-- Xet HB-->
                            <div class="form-group" id="NganhHB">
                                <label for="slNganhHB" class="col-sm-4 control-label">Nhóm ngành/Ngành - Tổ hợp môn đã đăng ký: </label>
                                <div class="col-sm-7">
                                <?php
								// Bo sung them inner join de lay them ten nganh; Neu cua hoc ba thi dua them diem 
									require_once("/PHP/ConnectDB.php");
									$conn = ConnectDB::connect();
									$sql = "SELECT A.MaTS, A.MaNganh, B.TenNganh, A.MaToHop,Mon1, Mon2, Mon3 FROM DangKyCD AS A INNER JOIN Nganh AS B ON A.MaNganh = B.MaNganh INNER JOIN ToHopMon AS C ON A.MaToHop = C.MaToHop WHERE A.MaTS = ".$_SESSION['MaTS'];

									$resut = mysqli_query($conn, $sql);
									if($resut->num_rows >0)
									{
										while ($row = $resut->fetch_assoc())
										{
											echo $row['TenNganh']." (".$row['Mon1']."-".$row['Mon2']."-".$row['Mon3'].") </br>";
										}
									}
									$sql = "SELECT A.MaTS, A.MaNganh, B.TenNganh, A.MaToHop,Mon1, Mon2, Mon3 FROM DangKyHB AS A INNER JOIN Nganh AS B ON A.MaNganh = B.MaNganh INNER JOIN ToHopMon AS C ON A.MaToHop = C.MaToHop WHERE A.MaTS = ".$_SESSION['MaTS'];
									$resut = mysqli_query($conn, $sql);
									if($resut->num_rows >0)
									{
										while ($row = $resut->fetch_assoc())
										{
											if($row['Mon3'] != "")
												echo $row['TenNganh']." (".$row['Mon1']."-".$row['Mon2']."-".$row['Mon3'].") </br>";	
											else
												echo $row['TenNganh']." (".$row['Mon1']."-".$row['Mon2'].") </br>";				
										}
									}
								?>    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="txtMaBaoVe" class="col-sm-4 control-label">Mã bảo vệ: </label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="txtMaBaoVe" name="txtMaBaoVe" placeholder="Mã bảo vệ" maxlength="5" required> 
                                    
                                </div>
                                <div class="col-sm-2">
                                    <img src="Khach/random_image.php" />
                                </div>
                            </div>                
                            <div class="form-group" align="center">
                                <button type="button" class="btn btn-warning" style="margin-right:10px" id="XemLai" data-toggle="modal" data-target="#myModal">Xem lại thông tin</button>
                                <button type="submit" class="btn btn-success" id="submit" name="submit" style="margin-right:10px">Điều chỉnh</button>
                                <a href="Index.php?menu=ThiSinh_DangNhap"><button type="button" class="btn btn-default">Làm lại</button></a>
                            </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" align="center" style="color:#F00">THÔNG TIN THÍ SINH ĐĂNG KÝ XÉT TUYỂN CAO ĐẲNG DỰA VÀO HỌC BẠ</h4>
      </div>
      <div class="modal-body">
        <div>
        	
            <table>
            	<tr>
                	<td colspan="2">
						<h4 class="modal-title bg-danger" style="color:#00F">THÔNG TIN THÍ SINH</h4>
                    </td>
                </tr>
            	<tr>
                	<td>Họ tên:</td>
                    <td><label id="lblHoTen"/></td>
                </tr>
                <tr>
                	<td>Giới tính:</td>
                    <td><label id="lblGioiTinh"/></td>
                </tr>
                <tr>
                	<td>Ngày sinh:</td>
                    <td><label id="lblNgaySinh"/></td>
                </tr>
                <tr>
                	<td>Số CMND:</td>
                    <td><label id="lblSoCMND"/></td>
                </tr>
                <tr>
                	<td>Hộ khẩu thường trú:</td>
                    <td>
                    	<label id="lblDiaChiThuongTru"/>
                        Mã tỉnh (thành phố): <label id="lblMaTinh"/>; Mã huyện (quận): <label id="lblMaHuyen"/>; Mã xã (phường): <label id="lblMaXa"/>
					</td>
                </tr>
                <tr>
                	<td>Mã tỉnh (thành phố):</td>
                    <td><label id="lblMaTinh"/></td>
                </tr>
                 <tr>
                	<td>Mã huyện (quận): </td>
                    <td><label id="lblMaHuyen"/></td>
                </tr>
                <tr>
                	<td>Mã xã (phường):</td>
                    <td><label id="lblMaXa"/></td>
                </tr>
                <tr>
                	<td>Địa chỉ nhận giấy báo trúng tuyển:</td>
                    <td><label id="lblDiaChiNhanGB"/></td>
                </tr>
                <tr>
                	<td>Số điện thoại:</td>
                    <td><label id="lblSoDT"/></td>
                </tr>
                <tr>
                	<td>Email:</td>
                    <td><label id="lblEmail"/></td>
                </tr>
                <tr>
                	<td>Nơi tốt nghiệp THPT:</td>
                    <td><label id="lblLop12"/></td>
                </tr>
                <tr>
                	<td>Đối tượng ưu tiên tuyển sinh:</td>
                    <td><label id="lblDoiTuong"/></td>
                </tr>
                <tr>
                	<td>Diện ưu tiên xét tuyển:</td>
                    <td><label id="lblDoiTuongUTXT"/></td>
                </tr>
                <tr>
                	<td>Mã trường, Tên trường khác có đăng ký:</td>
                    <td><label id="lblTruongKhac"/></td>
                </tr>
            	<tr>
                	<td colspan="2">
						<h4 class="modal-title bg-danger" style="color:#00F">NGUYỆN VỌNG ĐĂNG KÝ</h4>
                    </td>
                </tr>
            	<tr>
                	<td>Nhóm ngành/Ngành:</td>
                    <td><label id="lblNganhHB"/></td>
                </tr>
                <tr>
                	<td>Tổ hợp môn dùng dể xét tuyển:</td>
                    <td><label id="lblToHopMonHB"/></td>
                </tr>
            </table>
            <table width="100%">
            	<tr>
                	<td>Điểm môn 1: <label id="lblMon1"/></td>
                    <td>Điểm môn 2: <label id="lblMon2"/></td>
                    <td>Điểm môn 3: <label id="lblMon3"/></td>
                </tr>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>-->
<script type="text/javascript">
$(document).ready(function(){
	
	$("#XemLai").click(function(){
		$("#lblHoTen").text($("#txtHo").val()+" "+$("#txtTen").val());
		$("#lblGioiTinh").text($("#slGioiTinh :selected").text());//
		
		//Hien thi ngay sinh
		var NgaySinh = new Date($("#txtNgaySinh").val());
		var day = NgaySinh.getDate();
		var month = NgaySinh.getMonth() + 1;
		var year = NgaySinh.getFullYear();
		if (day < 10) {
			day = "0" + day;
		}
		if (month < 10) {
			month = "0" + month;
		}
		$("#lblNgaySinh").text(day + "/" + month + "/" + year);
		
		$("#lblSoCMND").text($("#txtSoCMND").val());
		$("#lblDiaChiThuongTru").text($("#txtDiaChiThuongTru").val());
		$("#lblMaTinh").text($("#slTinh :selected").text());//
		$("#lblMaHuyen").text($("#slHuyen :selected").text());//
		$("#lblMaXa").text($("#slXa :selected").text());//
		$("#lblDiaChiNhanGB").text($("#txtDiaChiNhanGB").val());
		$("#lblSoDT").text($("#txtSoDT").val());
		$("#lblEmail").text($("#txtEmail").val());
		$("#lblLop12").text($("#slLop12 :selected").text());//
		$("#lblDoiTuong").text($("#slDoiTuong :selected").text());//
		$("#lblDoiTuongUTXT").text($("#slDoiTuongUTXT :selected").text());//
		if($("#txtMaTruongKhac").val() != "") {
			$("#lblTruongKhac").text($("#txtMaTruongKhac").val()+" - "+$("#txtTenTruongKhac").val());
		}
		$("#lblNganhHB").text($("#slNganhHB :selected").text());//
		$("#lblToHopMonHB").text($("#slToHopMonHB :selected").text());//
		$("#lblMon1").text($("#txtMon1").val());
		$("#lblMon2").text($("#txtMon2").val());
		$("#lblMon3").text($("#txtMon3").val());
	});
	
	$("#slDoiTuongUTXT").change(function(){
		//Lựa chọn bài viết
		if($("#slDoiTuongUTXT").select().val() == 0){
			$("#MonDoatGiai").hide();
		}
		else {
			$("#MonDoatGiai").show();
		}
	});
	
	$("#slTinh").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
		$("#slHuyen").find('option').remove();
		$("#slXa").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "Khach/get_Huyen.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#slHuyen").html(html);
			} 
		});
	});
	
	$("#slHuyen").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
		$("#slXa").find('option').remove();
	
		$.ajax
		({
			type: "POST",
			url: "Khach/get_Xa.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#slXa").html(html);
			} 
		});
	});
	
});
</script>