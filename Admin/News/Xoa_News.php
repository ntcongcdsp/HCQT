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
	
		$sql = "DELETE FROM TinTuc WHERE ID = ".$_POST['txtID'];
		if($conn->query($sql) === TRUE)
		{
			ConnectDB::disconnect();
			echo "Đã xóa dữ liệu thành công. <a href='./index.php?menu=News'>Nhấp vào đây để vào trang Tin tức mới.</a>
<meta http-equiv='refresh' content='1;url=./index.php?menu=News' />";
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
    <?php
			require_once("../PHP/ConnectDB.php");
			$conn = ConnectDB::connect();
		
			$sql = "SELECT TieuDe FROM TinTuc WHERE ID = ".$_GET['ID'];
			$result = mysqli_query($conn, $sql);
            if($result->num_rows > 0)
            {
               $row = $result->fetch_assoc();
            }
            ConnectDB::disconnect();
		?>
       	<h1>Xóa Tin tức - "<?php echo $row['TieuDe']; ?>"</h1>
       	<h3>Bạn có chắc chắn muốn xóa?</h3>
	</div>
    <div class="control_group">
		<form class="form-horizontal" name="frmXoaDanhMuc" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="txtID" value="<?php echo $_GET['ID']; ?>"/>
			<div class="form-group" align="center">
               	<button type="submit" class="btn btn-danger" name="submit">Xóa</button>
                <a href="Index.php?menu=News"><button type="button" class="btn btn-default">Trở về</button></a>
			</div>
		</form>
	</div>
