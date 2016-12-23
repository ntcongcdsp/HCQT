
	<div class="row" style="background-color: whitesmoke; padding-top: 5px;">
    	<p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>NGÀNH ĐÀO TẠO</b> </p>
    </div>
    <div class="row" align="center">
<?php
$fileName_ChucNang = isset($_GET['chucnang']) ? $_GET['chucnang'].'_Nganh.php' : 'Doc_Nganh.php';
include('Nganh/'.$fileName_ChucNang); 
?>
	</div>
