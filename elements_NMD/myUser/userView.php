<div>Quản lý người dùng</div>
<div>Người dùng mới</div>
<div>
    <!-- Lưu ý: id của form phải là 'formreg' thì mới nhận action -->
    <form  name="newuser" id="formreg" method="post" action='./elements_NMD/myUser/userAct.php?reqact=addnew'>
        <table>
            <tr>
                <td>Tên đăng nhập: </td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td>Mật khẩu: </td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            <tr>
                <td>Họ tên: </td>
                <td><input type="text" name="hoten"></td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>Nam<input type="radio" name="gioitinh" id="nam" value="1" checked>Nữ <input type="radio" name="gioitinh" id="nu" value="0"></td>
            </tr>
            <tr>
                <td>Ngày sinh: </td>
                <td><input type="date" name="ngaysinh" id=""></td>
            </tr>
            <tr>
                <td>Địa chỉ: </td>
                <td><input type="text" name="diachi" id=""></td>
            </tr>
            <tr>
                <td>Điện thoại: </td>
                <td><input type="tel" name="sodienthoai" id=""></td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Gửi đi"></td>
                <td><input type="reset" value="Làm lại"><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
    <hr>
    
        <?php
            //Gọi để sài được class user
            require './elements_NMD/mod/userCls.php';
            $userObj = new user();
            $list_user = $userObj->UserGetAll();
            $l = count($list_user);
        ?>
    <div class="title_user">Danh sách người dùng</div>
    <div class="content_user">
        Trong bảng có <b><?php echo $l; ?></b>
    
        <table border="solid">
            <thead>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Ngày đăng ký</th>
                <th>Hoạt động</th>
                <th>Chức năng</th>
            </thead>
        
            <?php
                // trong sanh sách trả về có dữ liệu 
                if($l > 0){
                    foreach ($list_user as $u) {
                        ?>
                            <tr>
                        <td><?php echo $u->iduser; ?></td>
                        <td><?php echo $u->username; ?></td>
                        <td><?php echo $u->password; ?></td>
                        <td><?php echo $u->hoten; ?></td>
                        <td><?php echo $u->gioitinh; ?></td>
                        <td><?php echo $u->ngaysinh; ?></td>
                        <td><?php echo $u->diachi; ?></td>
                        <td><?php echo $u->sodienthoai; ?></td>
                        <td><?php echo $u->ngaydangky; ?></td>
                        <td><?php echo $u->setlock; ?></td>
                        <td align="center">
                            <a href="elements_NMD/myUser/userAct.php?reqact=deleteuser&iduser=<?php echo $u->iduser;?>">
                                Delete
                            </a>
                            <a href="index.php?req=updateuser&iduser=<?php echo $u->iduser;?>">
                                Change
                            </a>
                        </td>
                            </tr>
                        <?php
                    }
                }

            ?>
        </table>    
        
    </div>
</div>


