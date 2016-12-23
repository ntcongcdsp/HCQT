<?php
    include_once("../PHP/ConnectDB.php");
    if($_POST['MaTS'])
    {
        $conn = ConnectDB::connect();
        $MaTS=$_POST['MaTS'];
                
        //$sqlThiSinh = "SELECT A.MaTS, Ho, Ten, SoCMND, NgaySinh, GioiTinh, DiaChiThuongTru, MaTinh, MaHuyen, MaXa, DiaChiNhanGB, SoDT, Email, Lop12, MaDoiTuong, MaDoiTuongUTXT, MonDoatGiai, MaTruongKhac, TenTruongKhac, NgayDK, HoanThanhDK, NgayHoanThanhDK FROM thisinh AS A INNER JOIN DangKyCD AS B ON A.MaTS = B.MaTS WHERE SoCMND='$SoCMND' AND SoDT='$SoDT'";
        $sqlThiSinh = "SELECT * FROM thisinh WHERE MaTS=$MaTS";
		die($sqlThiSinh);
        $resut = mysqli_query($conn, $sqlThiSinh);
        if($resut->num_rows >0)
        {	
			$row = $resut->fetch_assoc();
        }
    }
?>
<!-- Modal -->
<table>
    <tr>
        <td colspan="2">
            <h4 class="modal-title bg-danger" style="color:#00F">THÔNG TIN THÍ SINH</h4>
        </td>
    </tr>
    <tr>
        <td>Họ tên:</td>
        <td><label id="lblHoTen"/><?php echo $row['Ho']." ".$row['Ten'] ?></td>
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
        <!--<td><label id="lblMaTruongKhac"/> - <label id="lblTenTruongKhac"/></td>-->
    </tr>
   <!-- <tr>
        <td>Tên trường khác có đăng ký:</td>
        <td><label id="lblTenTruongKhac"/></td>
    </tr>-->
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