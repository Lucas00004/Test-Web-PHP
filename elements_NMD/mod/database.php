 <!-- Lớp quản lý kết nối database -->

 <?php

    class Database {
        public $connect;

        public function Database(){
            // Liên kết file config.ini
            $init = parse_ini_file("config.ini");
            $servername = $init["servername"];
            $username = $init["username"];
            $dbname = $init["dbname"];
            $password = $init["pass"];   

            try{
                $this->connect = new PDO("mysql:host=$servername;"
                         . "dbname=$dbname; charset=utf8", $username, $password);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            } catch (PDOException $ex){
                $ex->getMessage();
            }
        }
    }


?>
