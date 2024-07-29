 <!-- Thừa kế kết nối từ lớp database để thực hiện các phép toán SIUD với bảng đữ liệu user -->

<?php

    $s = 'database.php';
    if(file_exists($s)){
        $f = $s;
    } else{
        $f = 'database.php';
    }

    require_once $f;

// Xử lý tại đây phục vụ cho việc gọi trang từ những vị trí khác nhau.
// có khi được gọi từ trang index.php ddeer lấy dữ liệu
// hoặc có khi gọi từ trang xử lý IUDD ...

    class user extends Database {
        public function UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $sodienthoai) {
            $sql = "INSERT INTO user (username, password, hoten, gioitinh, ngaysinh, diachi, sodienthoai) VALUES (?,?,?,?,?,?, ?, ?)";
            $data = array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $sodienthoai);
            $add = $this->connect->prepare($sql);
            $add->execute($data);
            return $add->rowCount();
        }
        public function UserCheckLogin($username, $password) {}
        public function UserCheckUsername($username) {}
        public function UserGetAll() {}
        public function UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $sodienthoai) {}
        public function UserGetbyId($iduser) {}
        public function UserDelete($iduser) {}
        public function UserSetPassword($iduser, $password) {}
    
    }





?>





