<?php
    session_start();
    
    if (isset($_SESSION['id'])&&($_SESSION['id']!==0)) {
            $userId=$_SESSION['id'];
            $userName=$_SESSION['user'];
           
    }
    else{
        header('Location:/DD2DD/login.php');
        die;
    }
  
   

?>
