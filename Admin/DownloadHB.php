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
?>

	<div class="row" style="background-color: whitesmoke; padding-top: 5px;">
    	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>TẢI DỮ LIỆU XÉT TUYỂN CAO ĐẲNG <br /> DỰA VÀO HỌC BẠ</p>
    </div>
    <div class="row" align="center">
<?php
$fileName_ChucNang = isset($_GET['chucnang']) ? $_GET['chucnang'].'_HB.php' : 'Doc_HB.php';
include('DownLoadHB/'.$fileName_ChucNang); 
?>
	</div>

