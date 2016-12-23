<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#00008B;">
  <div class="container" >
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" >
            <span class="sr-only">Đây là menu mobile</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php
            include_once(realpath(dirname(__DIR__))."/PHP/define.php");
        ?>
        <!--<a class="navbar-brand" href="./index.php">FindMyPet</a>-->
    </div>
    <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 10px;  ">
        <ul class="nav navbar-nav">
            <?php
                echo "<li class='active'><a href='".BASE_URL."index.php'>Trang chủ</a></li>";
				echo "<li class='active'><a href='".BASE_URL_Khach."News_All.php'>Tin tức</a></li>";
                echo "<li class='active'><a href='".BASE_URL_Khach."CBGV.php'>Cán bộ - Giảng viên</a></li>";
                echo "<li class='active'><a href='".BASE_URL_Khach."AnhHoatDong.php'>Ảnh hoạt động</a></li>";
                echo "<li class='active'><a href='".BASE_URL_Khach."LienHe.php'>Liên hệ</a></li>";
                echo "<li class='active'><a href='".BASE_URL_Khach."GVDKPhong.php'>Giảng viên đăng ký phòng</a></li>";
            ?>
        </ul>               
        <ul class="nav navbar-nav navbar-right">
        <?php
            /*
            if(array_key_exists('TenDN',$_SESSION) && array_key_exists('MatKhau',$_SESSION) && array_key_exists('MaPhanQuyen',$_SESSION))
            {
                
                if($_SESSION['MaPhanQuyen'] == NHOM_QUAN_TRI)
                {
                    echo "<li class='active'><a href='".BASE_URL."Admin/BaiViet_Tao.php'><span class='glyphicon glyphicon-file'></span> Đăng bài viết/bản tin</a></li>";
                    echo "<li class='active'><a href='".BASE_URL."Admin/DMChucNang.php'><span class='glyphicon glyphicon-cog'></span> Danh mục chức năng</a></li>";
                    echo "<li class='active'><a href='".BASE_URL."PHP/Logout.php'><span class='glyphicon glyphicon-log-out'></span> Đăng xuất</a></li>";
                }
                else if($_SESSION['MaPhanQuyen'] == NHOM_THANH_VIEN)
                {
                    echo "<li class='active'><a href='".BASE_URL."Khach/DangBai.php'><span class='glyphicon glyphicon-file'></span> Đăng bài viết/bản tin</a></li>";
                    echo "<li class='active'><a href='".BASE_URL."Khach/ThongTinCaNhan.php'><span class='glyphicon glyphicon-log-out'></span>Thông tin cá nhân</a></li>";
                    echo "<li class='active'><a href='".BASE_URL."PHP/Logout.php'><span class='glyphicon glyphicon-log-out'></span> Đăng xuất</a></li>";
                }
                else
                {
                    echo "<li class='active'><a href='".BASE_URL."PHP/Login.php'><span class='glyphicon glyphicon-log-in'></span> Đăng nhập</a></li>";
                    echo "<li class='active'><a href='".BASE_URL."Khach/DangKy.php'><span class='glyphicon glyphicon-user'></span> Đăng ký</a></li>";
                }
            }
            else
            {
                echo "<li class='active'><a href='".BASE_URL."PHP/Login.php'><span class='glyphicon glyphicon-log-in'></span> Đăng nhập</a></li>";
                echo "<li class='active'><a href='".BASE_URL."Khach/DangKy.php'><span class='glyphicon glyphicon-user'></span> Đăng ký</a></li>";
            }*/
        ?>
        </ul>
    </div><!--/.nav-collapse -->
  </div>
  </nav>   