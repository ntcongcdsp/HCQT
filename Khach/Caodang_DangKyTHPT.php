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
	session_start();
	$ho = "";
	$ten = "";
	$soCMND = "";
	$ngaySinh = "";
	$gioiTinh = "";
	$diaChiThuongTru = "";
	$maTinh = "";
	$maHuyen = "";
	$diaChiNhanGB = "";
	$soDT = "";
	$email = "";
	$lop12 = "";
	$maDoiTuong = "";
	$soBaoDanh = "";
	$maDKXT = "";
	$maNganh1 = "";
	$toHopMon1 = "";
	$maNganh2 = "";
	$toHopMon2 = "";
	
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
		$diaChiNhanGB = $_POST['txtDiaChiNhanGB'];
		$soDT = $_POST['txtSoDT'];
		$email = $_POST['txtEmail'];
		$lop12 = isset($_POST['slLop12']) ? $_POST['slLop12']: '00';
		$maDoiTuong = $_POST['slDoiTuong'];
		$soBaoDanh = $_POST['txtSoBaoDanh'];
		$maDKXT = $_POST['txtMaDKXT'];
		$maNganh1 = $_POST['slNganh1'];
		$toHopMon1 = $_POST['slToHopMon1'];
		$maNganh2 = $_POST['slNganh2'];
		$toHopMon2 = $_POST['slToHopMon2'];
		$NgayDK = date('Y-m-d H:i:s',time());
		
		if($_POST['txtMaBaoVe'] == $_SESSION['security_code'])
		{
			require_once("/PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
			// Insert co so du lieu
			
			$sql = "START TRANSACTION;
				INSERT INTO thisinh(Ho, Ten, SoCMND, NgaySinh, GioiTinh, DiaChiThuongTru, MaTinh, MaHuyen, DiaChiNhanGB, SoDT, Email, Lop12, MaDoiTuong, NgayDK) VALUES ('$ho', '$ten', $soCMND, '$ngaySinh', $gioiTinh, '$diaChiThuongTru', '$maTinh', '$maHuyen', '$diaChiNhanGB', '$soDT', '$email', '$lop12', '$maDoiTuong', '$NgayDK' ); 
				INSERT INTO dangkycd(MaTS, MaDKXT, SBD, MaNganh, MaToHop) VALUES (last_insert_id(),'$maDKXT','$soBaoDanh','$maNganh1','$toHopMon1'); 
				INSERT INTO dangkycd(MaTS, MaDKXT, SBD, MaNganh, MaToHop) VALUES (last_insert_id(),'$maDKXT','$soBaoDanh','$maNganh2','$toHopMon2'); 
				COMMIT;";
			
			if($conn->multi_query($sql) === TRUE)
			{
				ConnectDB::disconnect();
				echo "<h3>Bạn đã đăng ký xét tuyển Trường cao đẳng sư phạm Thừa Thiên Huế thành công. </h3>Trường sẽ sớm liên lạc với bạn <a href='index.php?menu=CaoDang_THPT'>Nhấp vào đây để vào trang Hướng dẫn đăng ký xét tuyển kết quả thi THPT Quốc gia.</a>
			<meta http-equiv='refresh' content='1;url=index.php?menu=CaoDang_THPT' />";
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
	<div class="col-xs-12">
		<div class="panel panel-primary">
    		<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;">
            	<b>ĐĂNG KÝ XÉT TUYỂN CAO ĐẲNG DỰA VÀO KẾT QUẢ KỲ THI THPT QUỐC GIA</b>     
                <?php
					require_once("/PHP/ConnectDB.php");
					$conn = ConnectDB::connect();
				?>
	        </div>
    	    <div class="panel-body">
				<div class="row" style="position:relative;right:20px;">
                	<div class="col-sm-12" align="center">
                        <h3 style="color:#F00">THÔNG TIN THÍ SINH</h3>
					</div>
                	<form class="form-horizontal" name="frmDangKy" method="post" enctype="multipart/form-data">
                	<div class="form-group">
    					<label for="txtHo" class="col-sm-4 control-label">Họ và tên thí sinh: </label>
    					<div class="col-sm-5">
      						<input type="text" class="form-control" id="txtHo" name="txtHo" placeholder="Họ của thí sinh" required value="<?php echo $ho; ?>">
    					</div>
                        <div class="col-sm-2">
      						<input type="text" class="form-control" id="txtTen" name="txtTen" placeholder="Tên của thí sinh" required value="<?php echo $ten;?>">
    					</div>
  					</div>
                    <div class="form-group">
                        <label for="slGioiTinh" class="col-sm-4 control-label">Giới tính: </label>
                        <div class="col-sm-2">
                            <select class="form-control" name="slGioiTinh" id="slGioiTinh">
                            	<option value="0" selected> Nam </option>
                                <option value="1"> Nữ </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
    					<label for="txtNgaySinh" class="col-sm-4 control-label">Ngày, tháng, năm sinh: </label>
    					<div class="col-sm-3">
      						<input type="date" class="form-control" name="txtNgaySinh" id="txtNgaySinh" placeholder="Ngày, tháng năm sinh của thí sinh" required value="<?php echo $ngaySinh ?>">
    					</div>
  					</div>
                    <div class="form-group">
    					<label for="txtSoCMND" class="col-sm-4 control-label">Số CMND (như hồ sơ đăng ký dự thi): </label>
    					<div class="col-sm-7">
      						<input type="number" class="form-control" name="txtSoCMND" id="txtSoCMND" placeholder="Số CMND (như hồ sơ đăng ký dự thi" required maxlength="11" value="<?php echo $soCMND ?>">
    					</div>
  					</div>
                    <div class="form-group">
    					<label for="txtdiaChiThuongTru" class="col-sm-4 control-label">Hộ khẩu thường trú: </label>
    					<div class="col-sm-7">
                        	<input type="text" class="form-control" name="txtDiaChiThuongTru" id="txtDiaChiThuongTru" placeholder="Hộ khẩu thường trú" required value="<?php echo $diaChiThuongTru ?>">
                            <table width="100%">
								<tr>
                                	<td width="30%">
                                    	<label for="slTinh" style="font-size:14px;" >Mã tỉnh (thành phố): </label>
                                    	<select class="form-control" name="slTinh" id="slTinh">
                                        	<option value="">--Chọn Tỉnh (T.Phố)--</option>
										<?php	
                                        	$conn = ConnectDB::connect();
                                            $sql = "SELECT * FROM Tinh";
                                            $resut = mysqli_query($conn, $sql);
                                            if($resut->num_rows >0)
                                            {
                                            	while ($row = $resut->fetch_assoc())
                                                {
													echo "<option value='".$row['MaTinh']."'> (".$row['MaTinh'].") ".$row['TenTinh']."</option>";										
                                                }
											}
										?>
										</select>
                                    </td>
                                   	<td width="30%">
                                    	<label for="slHuyen" style="font-size:14px" >Mã huyện (quận): </label>
                                    	<select class="form-control" name="slHuyen" id="slHuyen">
                                        	<option value="">--Chọn Huyện (Quận)--</option>
                                        </select>
                                    </td>
								</tr>
							</table>
    					</div>
  					</div>
                    <div class="form-group">
    					<label for="txtDiaChiNhanGB" class="col-sm-4 control-label">Địa chỉ nhận giấy báo trúng tuyển: </label>
    					<div class="col-sm-7">
      						<input type="text" class="form-control" name="txtDiaChiNhanGB" id="txtDiaChiNhanGB" placeholder="Địa chỉ nhận giấy báo trúng tuyển" required value="<?php echo $diaChiNhanGB; ?>">
    					</div>
  					</div>
                    <div class="form-group">
    					<label for="txtSoDT" class="col-sm-4 control-label">Số điện thoại: </label>
    					<div class="col-sm-7">
      						<input type="number" class="form-control" name="txtSoDT" id="txtSoDT" placeholder="Số điện thoại" required value="<?php echo $soDT; ?>">
    					</div>
  					</div>
                    <div class="form-group">
    					<label for="txtEmail" class="col-sm-4 control-label">Email: </label>
    					<div class="col-sm-7">
      						<input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Email" value="<?php echo $email; ?>">
    					</div>
  					</div>
                    <div class="form-group">
    					<label for="slLop12" class="col-sm-4 control-label">Nơi tốt nghiệp THPT: </label>
    					<div class="col-sm-7">
      						<select class="form-control" name="slLop12" id="slLop12">
							<?php	
                                $conn = ConnectDB::connect();
                                $sql = "SELECT * FROM THPT";
                                $resut = mysqli_query($conn, $sql);
                                if($resut->num_rows >0)
                                {
                                    while ($row = $resut->fetch_assoc())
                                    {
										if($row['MaTruong'] == $lop12)
											echo "<option value='".$row['MaTruong']."' selected> ".$row['TenTruong']."(Khu vực: ".$row['KhuVuc'].")</option>";								else
                                        	echo "<option value='".$row['MaTruong']."'> ".$row['TenTruong']."(Khu vực: ".$row['KhuVuc'].")</option>";										
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
                                $conn = ConnectDB::connect();
                                $sql = "SELECT * FROM DoiTuong ORDER BY MaDoiTuong ASC";
                                $resut = mysqli_query($conn, $sql);
                                if($resut->num_rows >0)
                                {
                                    while ($row = $resut->fetch_assoc())
                                    {
										if($row['MaDoiTuong'] == $maDoiTuong)
											echo "<option value='".$row['MaDoiTuong']."' selected> ".$row['MaDoiTuong']." - ".$row['DienGiai']."</option>";
										else
                                        	echo "<option value='".$row['MaDoiTuong']."'> ".$row['MaDoiTuong']." - ".$row['DienGiai']."</option>";										
                                    }
                                }
                            ?>
                            </select>
    					</div>
  					</div>                                        
                    <!-- Dang ky loai hinh xet tuyen -->
                    <div class="form-group" id="SoBaoDanh">
    					<label for="txtSoBaoDanh" class="col-sm-4 control-label">Số báo danh (trong kỳ thi THPT quốc gia): </label>
    					<div class="col-sm-7">
      						<input type="text" class="form-control" name="txtSoBaoDanh" id="txtSoBaoDanh" placeholder="Số báo danh (trong kỳ thi THPT quốc gia)" required maxlength="9" value="<?php echo $soBaoDanh; ?>">
    					</div>
  					</div>
                    
                    <div class="form-group" id="MaDKXT">
    					<label for="txtMaDKXT" class="col-sm-4 control-label">Mã ĐKXT: </label>
    					<div class="col-sm-7">
      						<input type="number" class="form-control" name="txtMaDKXT" id="txtMaDKXT" placeholder="Mã đăng ký xét tuyển" required maxlength="12" value="<?php echo $maDKXT; ?>">
    					</div>
  					</div>
                    
                    <!-- Đăng ký xét tuyển vào Trường -->
					<div class="col-sm-12" align="center">
                   		<h3 style="color:#F00">CÁC NGUYỆN VỌNG ĐĂNG KÝ</h3>
                   		<h4 style="font-style:inherit">(Xếp theo thứ tự ưu tiên từ trên xuống dưới)</h4>
					</div>
                    
                    <!-- Nganh dang ky - Xet Diem THPT-->
                    <div class="form-group" id="Nganh1">
    					<label for="slNganh1" class="col-sm-4 control-label">1. Nhóm ngành/Ngành: </label>
    					<div class="col-sm-7">
      						<select class="form-control" name="slNganh1" id="slNganh1">
                            	<option value="">--Chọn Ngành ưu tiên 1--</option>
							<?php	
                                $conn = ConnectDB::connect();
                                $sql = "SELECT * FROM Nganh WHERE HeDaoTao=1 OR HeDaoTao=8";
                                $resut = mysqli_query($conn, $sql);
                                if($resut->num_rows >0)
                                {
                                    while ($row = $resut->fetch_assoc())
                                    {
										echo "<option value='".$row['MaNganh']."'> ".$row['TenNganh']."</option>";										
									}
                                }
                            ?>
                            </select>
    					</div>
  					</div>
                    <div class="form-group" id="ToHopMon1">
    					<label for="slToHopMon1" class="col-sm-4 control-label">Tổ hợp môn thi dùng để xét tuyển: </label>
    					<div class="col-sm-7">
      						<select class="form-control" name="slToHopMon1" id="slToHopMon1">
                            	<option value="">--Chọn Tổ hợp môn xét tuyển ngành ưu tiên 1--</option>
                            </select>
    					</div>
  					</div>
                    <div class="form-group" id="Nganh2">
    					<label for="slNganh2" class="col-sm-4 control-label">2. Nhóm ngành/Ngành: </label>
    					<div class="col-sm-7">
      						<select class="form-control" name="slNganh2" id="slNganh2">
                            	<option value="">--Chọn Ngành ưu tiên 2--</option>
							<?php	
                                $conn = ConnectDB::connect();
                                $sql = "SELECT * FROM Nganh WHERE HeDaoTao=1 OR HeDaoTao=8";
                                $resut = mysqli_query($conn, $sql);
                                if($resut->num_rows >0)
                                {
                                    while ($row = $resut->fetch_assoc())
                                    {
										echo "<option value='".$row['MaNganh']."'> ".$row['TenNganh']."</option>";										
                                    }
                                }
                            ?>
                            </select>
    					</div>
  					</div>
                     <div class="form-group" id="ToHopMon2">
    					<label for="slToHopMon2" class="col-sm-4 control-label">Tổ hợp môn thi dùng để xét tuyển: </label>
    					<div class="col-sm-7">
      						<select class="form-control" name="slToHopMon2" id="slToHopMon2">
                            	<option value="">--Chọn Tổ hợp môn xét tuyển ngành ưu tiên 2--</option>
                            </select>
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
                        <button type="submit" class="btn btn-success" id="submit" name="submit" style="margin-right:10px">Đăng ký</button>
                        <a href="Index.php?menu=CaoDang_THPT"><button type="button" class="btn btn-default">Trở về</button></a>
                    </div>
                </form>
                </div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" align="center" style="color:#F00">THÔNG TIN THÍ SINH ĐĂNG KÝ XÉT TUYỂN CAO ĐẲNG DỰA VÀO KẾT QUẢ KỲ THI THPT QUỐC GIA</h4>
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
                        Mã tỉnh (thành phố): <label id="lblMaTinh"/>; Mã huyện (quận): <label id="lblMaHuyen"/>.
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
                	<td>Số báo danh (trong kỳ thi THPT quốc gia:</td>
                    <td><label id="lblSoBaoDanh"/></td>
                </tr>
                <tr>
                	<td>Mã ĐKXT:</td>
                    <td><label id="lblMaDKXT"/></td>
                </tr>
            	<tr>
                	<td colspan="2">
						<h4 class="modal-title bg-danger" style="color:#00F">CÁC NGUYỆN VỌNG ĐĂNG KÝ</h4>
						<h5 class="modal-title bg-danger" >(Xếp theo thứ tự ưu tiên từ trên xuống dưới)</h5>
                    </td>
                </tr>
            	<tr>
                	<td>1. Nhóm ngành/Ngành:</td>
                    <td><label id="lblNganh1"/></td>
                </tr>
                <tr>
                	<td>Tổ hợp môn dùng dể xét tuyển:</td>
                    <td><label id="lblToHopMon1"/></td>
                </tr>
                <tr>
                	<td>2. Nhóm ngành/Ngành:</td>
                    <td><label id="lblNganh2"/></td>
                </tr>
                <tr>
                	<td>Tổ hợp môn dùng dể xét tuyển:</td>
                    <td><label id="lblToHopMon2"/></td>
                </tr>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
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
		//$("#lblNgaySinh").text($("#txtNgaySinh").val());
		$("#lblSoCMND").text($("#txtSoCMND").val());
		$("#lblDiaChiThuongTru").text($("#txtDiaChiThuongTru").val());
		$("#lblMaTinh").text($("#slTinh :selected").text());//
		$("#lblMaHuyen").text($("#slHuyen :selected").text());//
		$("#lblDiaChiNhanGB").text($("#txtDiaChiNhanGB").val());
		$("#lblSoDT").text($("#txtSoDT").val());
		$("#lblEmail").text($("#txtEmail").val());
		$("#lblLop12").text($("#slLop12 :selected").text());//
		$("#lblDoiTuong").text($("#slDoiTuong :selected").text());//
		$("#lblSoBaoDanh").text($("#txtSoBaoDanh").val());
		$("#lblMaDKXT").text($("#txtMaDKXT").val());
		$("#lblNganh1").text($("#slNganh1 :selected").text());//
		$("#lblToHopMon1").text($("#slToHopMon1 :selected").text());//
		$("#lblNganh2").text($("#slNganh2 :selected").text());//
		$("#lblToHopMon2").text($("#slToHopMon2 :selected").text());//
	});

	
	//Mặc định sẽ ẩn các phần của đăng tin
	
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
	
	$("#slNganh1").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "Khach/get_ToHopMon.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#slToHopMon1").html(html);
			} 
		});
	});
	
	$("#slNganh2").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "Khach/get_ToHopMon.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#slToHopMon2").html(html);
			} 
		});
	});
	
	$("#slNganhHB").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "Khach/get_ToHopMon.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#slToHopMonHB").html(html);
			} 
		});
	});
	
});
</script>