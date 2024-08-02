 <!-- Thừa kế kết nối từ lớp database để thực hiện các phép toán SIUD với bảng đữ liệu user -->
<?php
    $s = 'database.php';
    if(file_exists($s)){
        $f = $s;
    }else{
        $f = 'database.php';
    }
    require_once($f);

// Xử lý tại đây phục vụ cho việc gọi trang từ những vị trí khác nhau.
// có khi được gọi từ trang index.php ddeer lấy dữ liệu
// hoặc có khi gọi từ trang xử lý SIUD ...

    class user extends Database {

        public function UserCheckUsername($username){
            $select = $this->connect->prepare("select * from user where username = ?");
            $select->setFetchMode(PDO::FETCH_OBJ);
            $select->execute(array($username));
            if(count($select->fetchAll()) == 1){
                return true;
            }else{
                return false;
            }
        }

        public function UserGetAll(){
            $getall = $this->connect->prepare("select * from user");
            $getall->setFetchMode(PDO::FETCH_OBJ);
            $getall->execute();

            return $getall->fetchAll();
        }
        public function UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $sodienthoai) {
            $sql = "INSERT INTO user (username, password, hoten, gioitinh, ngaysinh, diachi, sodienthoai) VALUES (?,?,?,?,?,?,?)";
            $data = array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $sodienthoai);

            $add = $this->connect->prepare($sql);
            $add->execute($data);
            return $add->rowCount();
        }

        public function UserCheckLogin($username, $password){
            $select = $this->connect->prepare("select * from user "
                        . "where username = ? and password = ? and active=1");
            $select->setFetchMode(PDO::FETCH_OBJ);
            $select->execute(array($username, $password));

            if(count($select->fetAll()) == 1){
                return true;
            }else{
                return false;
            }
        }

        public function UserUpdate( $username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $sodienthoai, $iduser) {
            $update = $this->connect->prepare("UPDATE user SET" 
                            . " username = ?, password = ?, hoten = ?, gioitinh = ?, ngaysinh = ?, diachi = ?, sodienthoai = ? "
                            . "WHERE iduser = ?");

            $update->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $sodienthoai, $iduser));
            return $update->rowCount();
        }

        // Chọn thông tin user bằng id
        public function UserGetbyId($iduser) {
            $getTk = $this->connect->prepare("select * from user where iduser=?");
            $getTk->setFetchMode(PDO::FETCH_OBJ);
            $getTk->execute(array($iduser));

            return $getTk->fetch();
        }

        public function UserDelete($iduser) {
            $sql = "DELETE from user where iduser = ?";
            $data = array($iduser);

            $del= $this->connect->prepare($sql);
            $del->execute($data);
            return $del->rowCount();
        }
        //Set password cho user
        public function UserSetPassword($iduser, $password) {
            $update = $this->connect->prepare("update user set password=? where iduser=?");
            $update->execute(array($setlock, $iduser));

            return $update->rowCount();
        }

        public function UserSetActive($iduser, $setlock) {
            
        }

        public function UserChangePassword($username,$passwordold, $passwordnew) {
            $selectMk = $this->connect->prepare("select password from user where username = ?");
            $selectMk->setFetchMode(PDO::FETCH_OBJ);
            $selectMk->execute(array($username));

            if(count($selectMk->fetch()) == 1){
                $temp = $selectMk->fetch();

                if($passwordold == $temp->password){
                    $update = $this->connect->prepare("update user set password=? where username=?");
                    $update->execute(array($passwordnew, $username));
                    return $update->rowCont();
                }else{
                    return false;
                }
            }
        }
            
        }

// Test add user
   
 
?>










