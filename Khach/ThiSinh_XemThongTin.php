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
	/*session_start();

	$_SESSION['MaTS'] = "";
	if(isset($_POST['submit_DangNhap']))
	{
		$soCMND_DN = $_POST['txtSoCMND_DangNhap'];
		$soDT_DN = $_POST['txtSoDT_DangNhap'];
		require_once("/PHP/ConnectDB.php");
		$conn = ConnectDB::connect();
		$sql = "SELECT * FROM ThiSinh WHERE SoCMND = $soCMND_DN and SoDT = $soDT_DN";
		$resut = mysqli_query($conn, $sql);
		
		if($resut->num_rows>0)
		{
			$row = $resut->fetch_assoc();
			$_SESSION['MaTS'] = $row['MaTS'];
			$_SESSION['SoCMND_DN'] = $row['SoCMND'];
			$_SESSION['SoDT_DN'] = $row['SoDT'];
			ConnectDB::disconnect();
				echo "Đăng nhập thành công. <a href='index.php?menu=ThiSinh_DieuChinh'>Nhấp vào đây để vào trang Điều chỉnh thông tin đăng ký xét tuyển.</a>
			<meta http-equiv='refresh' content='1;url=index.php?menu=ThiSinh_DieuChinh' />";
				exit;
		}
	}*/
	
?>

<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
    		<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;">
            	<b>THÔNG TIN ĐĂNG KÝ XÉT TUYỂN</b>          
	        </div>
    	    <div class="panel-body">
				<div class="row" style="position:relative;left:20px">
	                <form class="form-horizontal" name="frmDangNhap" method="post" enctype="multipart/form-data">
                	<div class="form-group">
    					<label for="txtSoCMND_DangNhap" class="col-sm-4 control-label">Số CMND (đã nhập khi đăng ký xét tuyển): </label>
    					<div class="col-sm-7">
      						<input type="number" class="form-control" name="txtSoCMND_DangNhap" id="txtSoCMND_DangNhap" placeholder="Số CMND (như hồ sơ đăng ký dự thi)" required maxlength="11">
    					</div>
  					</div>
                    <div class="form-group">
    					<label for="txtSoDT_DangNhap" class="col-sm-4 control-label">Số điện thoại (đã nhập khi đăng ký xét tuyển): </label>
    					<div class="col-sm-7">
      						<input type="number" class="form-control" name="txtSoDT_DangNhap" id="txtSoDT_DangNhap" placeholder="Số điện thoại" required>
    					</div>
  					</div>
                    <div class="form-group" align="center">
                        <button type="button" class="btn btn-success" id="submit_DangNhap" name="submit_DangNhap" style="margin-right:10px">Xem thông tin</button>
                        <a href="Index.php"><button type="button" class="btn btn-default">Trở về</button></a>
                    </div>
                    </form>
                  </div>
				<!--</div>-->
				<div class="row" style="position:relative;right:20px;margin-left:20px" id="ThongTin">
                <!-- Đưa bảng thông tin thí sinh vào đây -->
                </div>
        	</div>
    	</div>
	</div>
</div>
<script type="text/javascript">

$(document).ready(function(){
	
	$("#submit_DangNhap").click(function(){
		var SoCMND=$("#txtSoCMND_DangNhap").val();
		var SoDT=$("#txtSoDT_DangNhap").val();
		var dataString = 'SoCMND='+ SoCMND + '&SoDT=' + SoDT;
				
		$.ajax
		({
			type: "POST",
			url: "Khach/get_ThongTin.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$("#ThongTin").html(html);
			} 
		});
	});	
});
</script>