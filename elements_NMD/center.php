<?php
   if(isset($_GET['req'])){
        $request = $_GET['req'];
        switch ($request) {
            case 'userview':
                require './elements_NMD/myUser/userView.php';
                break;

            case 'exjs':
                require './elements_NMD/pageJs/exjs.php';
                break;

            case 'updateuser';
                require './elements_NMD/myUser/userUpdate.php';
            default:
                # code...
                break;
        }
    }
    else{
        require './elements_NMD/default.php';
    }
?>
