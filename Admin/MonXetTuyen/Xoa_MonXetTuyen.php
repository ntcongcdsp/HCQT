<?php
/*	session_start();
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
	
		$sql = "DELETE FROM MonXetTuyen WHERE MaNganh = '".$_POST['txtMaNganh']."' AND MaToHop = '".$_POST['txtMaToHop']."'";
		if($conn->query($sql) === TRUE)
		{
			ConnectDB::disconnect();
			echo "Đã xóa dữ liệu thành công. <a href='./index.php?menu=MonXetTuyen'>Nhấp vào đây để vào trang Ngành - Môn xét tuyển.</a>
<meta http-equiv='refresh' content='1;url=./index.php?menu=MonXetTuyen' />";
			exit;
		}
		else
		{
			echo 'Loi: '. $conn->connect_error;
		}
		ConnectDB::disconnect();
	}
?>

	<div class="bg-danger">
       	<h1>Xóa Ngành - Tổ hợp môn xét tuyển - "<?php echo $_GET['MaNganh']." - ".$_GET['MaToHop']; ?>"</h1>
       	<h3>Bạn có chắc chắn muốn xóa?</h3>
	</div>
    <div class="control_group">
		<form class="form-horizontal" name="frmXoaDanhMuc" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="txtMaNganh" value="<?php echo $_GET['MaNganh']; ?>"/>
            <input type="hidden" name="txtMaToHop" value="<?php echo $_GET['MaToHop']; ?>"/>
			<div class="form-group" align="center">
               	<button type="submit" class="btn btn-danger" name="submit">Xóa</button>
                <a href="Index.php?menu=MonXetTuyen"><button type="button" class="btn btn-default">Trở về</button></a>
			</div>
		</form>
	</div>
