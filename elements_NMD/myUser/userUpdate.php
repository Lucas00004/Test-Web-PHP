<div>Cập nhật người dùng</div>
<?php
    require './elements_NMD/mod/userCls.php';
    //Nhận dữ liệu iduser
    $iduser = $_REQUEST['iduser'];
    echo $iduser;
    //Load dữ liệu đối tượng để cập nhật
    $userObj = new user();
    $getUserUpdate = $userObj->UserGetbyId($iduser);

    //Tạo form hiển thị dữ liệu để sửa
?>

<div>
    <!-- Lưu ý: id của form phải là 'formreg' thì mới nhận action 
    1. Chú ý dữ liệu giới tính đặc biệt 
    2. Muốn cập nhật user info phải gửi iduser, có 2 cách gửi:
    Một là gửi kiểu action trong form tới 
    Hai là gửi bằng thẻ hidden
    -->
    <form  name="updateuser" id="formupdate" method="post" action='./elements_NMD/myUser/userAct.php?reqact=updateuser'>
        
    <!--Tạo input kiểu hidden sẽ ẩn trên layout nhưng sẽ post value khi submit -->
        <input type="hidden" name="iduser" value="<?php echo $getUserUpdate->iduser;?>">
        <table>
            <tr>
                <td>Tên đăng nhập: </td>
                <td><input type="text" name="username" value="<?php echo $getUserUpdate->username; ?>"></td>
            </tr>
            <tr>
                <td>Mật khẩu: </td>
                <td><input type="text" name="password" value="<?php echo $getUserUpdate->password; ?>"></td>
            </tr>
            <tr>
                <td>Họ tên: </td>
                <td><input type="text" name="hoten" value="<?php echo $getUserUpdate->hoten;?>"></td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>Nam<input type="radio" name="gioitinh" value="1" <?php if($getUserUpdate->gioitinh == 1) echo 'checked';?> >
                    Nữ <input type="radio" name="gioitinh" value="0" <?php if($getUserUpdate->gioitinh == 0) echo 'checked';?>></td>
            </tr>
            <tr>
                <td>Ngày sinh: </td>
                <td><input type="date" name="ngaysinh" value="<?php echo $getUserUpdate->ngaysinh; ?>"></td>
            </tr>
            <tr> 
                <td>Địa chỉ: </td>
                <td><input type="text" name="diachi" value="<?php echo $getUserUpdate->diachi; ?>"></td>
            </tr>
            <tr>
                <td>Điện thoại: </td>
                <td><input type="tel" name="sodienthoai" value="<?php echo $getUserUpdate->sodienthoai; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Update"></td>
                <!-- <td><input type="reset" value="Làm lại"><b id="noteForm"></b></td> -->
            <!-- Xoa reset vi click vao mat het du lieu dang nhap -->
            </tr>
        </table>
    </form>
</div>
