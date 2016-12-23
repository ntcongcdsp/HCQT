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
	}*/
?>
<div class="row" style="background-color: whitesmoke;padding-top: 5px;">
    <p class="bg-primary" style="margin-right: 5px;margin-left: 5px;font-size: 30px;color:white;font-family: tahoma;text-align: center;border-radius:5px;padding-bottom: 5px;"> <b>DANH MỤC CHỨC NĂNG</b> </p>
</div>
<div class="row">
     <div>
        <ul class="ca-menu">
                <li style="margin-left: 25px; border-radius:20px;">
                    <?php
                     echo "<a href='".BASE_URL_Admin."Index.php?menu=DownLoadTHPT'>";
                    ?>
                        <!--<span class="ca-icon">&#126;</span>-->
                        <!--<div class="ca-content">-->
                            <h4 class="ca-main">Tải dữ liệu XT <br />Điểm thi THPT Quốc Gia</h4>
                        <!--</div>-->
                    </a>
                </li>
                <li style="margin-left: 25px; border-radius:20px;">
                    <?php
                     echo "<a href='".BASE_URL_Admin."Index.php?menu=DownLoadHB'>";
                    ?>
                        <h4 class="ca-main">Tải dữ liệu XT <br />Học bạ</h4>
                    </a>
                </li>
                <li style="margin-left: 30px; border-radius:20px;">
                    <?php
                     echo "<a href='".BASE_URL_Admin."Index.php?menu=DownLoadTC'>";
                    ?>
                    	<h4 class="ca-main">Tải dữ liệu ĐKXT <br />TRUNG CẤP</h4>
                    </a>
                </li>
                <li style="margin-left: 30px; border-radius:20px;">
                    <?php
                     echo "<a href='".BASE_URL_Admin."Index.php?menu=CapNhatHoSo'>";
                    ?>
                        <h2 class="ca-main">Cập nhật hồ sơ</h2>
                    </a>
                </li>      
            </ul>
        </div><!-- content -->
</div>
<div class="row">
     <div>
        <ul class="ca-menu">
                
                <li style="margin-left: 25px; border-radius:20px;">
                    <?php
                     echo "<a href='".BASE_URL_Admin."Index.php?menu=Nganh'>";
                    ?>
                        <h2 class="ca-main">Ngành đào tạo</h2>
                    </a>
                </li>
                <li style="margin-left: 30px; border-radius:20px;">
                    <?php
                     echo "<a href='".BASE_URL_Admin."Index.php?menu=ToHopMon'>";
                    ?>
                       <h2 class="ca-main">Tổ hợp môn</h2>
                    </a>
                </li>
                <li style="margin-left: 30px; border-radius:20px;">
                    <?php
                     echo "<a href='".BASE_URL_Admin."Index.php?menu=MonXetTuyen'>";
                    ?>
                        <h2 class="ca-main">Môn xét tuyển</h2>
                    </a>
                </li>
                <li style="margin-left: 30px; border-radius:20px;">
                    <?php
                     echo "<a href='".BASE_URL_Admin."Index.php?menu=News'>";
                    ?>
						<h2 class="ca-main">Quản lý tin tức</h2>
                    </a>
                </li>
            </ul>
        </div><!-- content -->
</div>    