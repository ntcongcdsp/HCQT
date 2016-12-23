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
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-primary">
    		<div class="panel-heading" style="text-align: center; font-family: time new roman; font-size:17px;">
            	<b>ĐĂNG KÝ XÉT TUYỂN CAO ĐẲNG</b>
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
                </div>
				<div style="text-align:right;">
        			<a class="button" href="index.php">Trở về</a>
				</div>
			</div>
		</div>
	</div>
</div>