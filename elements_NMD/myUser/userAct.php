<?php
    require '../mod/userCls.php';
//nếu có biến yêu cầu đúng thì cho vô còn không đẩy về index.php ngăn ko cho truy cập không mục đích rõ ràng
    if(isset($_GET['reqact'])) {
        $requestAction = $_GET['reqact'];
        switch($requestAction){
            case 'addnew':
                //Xử lý thêm mới
                //Nhận dữ liệu
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];
                $hoten = $_REQUEST['hoten'];
                $gioitinh = $_REQUEST['gioitinh'];
                $ngaysinh = $_REQUEST['ngaysinh'];
                $diachi = $_REQUEST['diachi'];
                $sodienthoai = $_REQUEST['sodienthoai'];
                
                //Khởi tạo đối tượng và thêm dữ liệu
                $user = new user();
                $rs = $user->UserAdd($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$sodienthoai);
                if($rs){
                    header('location:../../index.php?req=userview&result=ok');
                }else{
                    header('location:../../index.php?req=userview&result=failed');
                };
                break;

            case 'deleteuser':
                //Nhạn dữ liệu gửi về và kiểm thử
                $iduser = $_REQUEST['iduser'];
                //khởi tạo đối tượng và delete
                $userObj = new user();
                $rs = $userObj->UserDelete($iduser);
                //xử lý kết quả trả về
                if($rs){
                    header('location:../../index.php?req=userview&result=ok');
                }else{
                    header('location:../../index.php?req=userview&result=failed');
                };
                
                break;

            case 'updateuser';
                //Nhận dữ liệu
                $iduser = $_REQUEST['iduser']; 
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];
                $hoten = $_REQUEST['hoten'];
                $gioitinh = $_REQUEST['gioitinh'];
                $ngaysinh = $_REQUEST['ngaysinh'];
                $diachi = $_REQUEST['diachi'];
                $sodienthoai = $_REQUEST['sodienthoai'];

                // //Kiem tra thu co nhan du lieu chua
                // echo  $iduser . '<br/>';
                // echo  $username . '<br/>';
                // echo  $password . '<br/>';
                // echo  $hoten . '<br/>';
                // echo  $gioitinh . '<br/>';
                // echo  $ngaysinh . '<br/>';
                // echo  $diachi . '<br/>';
                // echo  $sodienthoai . '<br/>';

                //Tao Obj va thuc hien update roi xu ly kq tra ve
                $userObj = new user();
                $rs = $userObj->UserUpdate($username,$password,$hoten,$gioitinh,$ngaysinh,$diachi,$sodienthoai,$iduser);
                
                if($rs){
                    header('location:../../index.php?req=userview&result=ok');
                }else{
                    header('location:../../index.php?req=userview&result=failed');
                };
                break;
            default :
                //dành cho trường hợp không gán thí đại giá trị nào đó không trong cấu trúc xử lí
                header('./index.php?req=userview');
                break;
        }
    } else{
        //nhảy lại địa chỉ index.php
        header('location:../../index.php?req=userview');
    };






