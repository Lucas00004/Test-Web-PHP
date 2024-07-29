<?php
   if(isset($_GET['req'])){
        $request = $_GET['req'];
        switch ($request) {
            case 'userview':
                require './elements_NMD/myUser/userView.php';
                break;

            case 'ExJs':
                # code...
                break;

            default:
                # code...
                break;
        }
    }
    else{
        require './elements_NMD/default.php';
    }
?>
