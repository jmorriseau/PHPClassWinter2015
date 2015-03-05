<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        session_start();
        
//        if(isset($_SESSION['hello'])){
//          echo $_SESSION['hello'];            
//        }else{
//            echo 'Session not set';
//        }
        
        if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)){
            echo 'You are logged in.';
        } else {
            echo 'You must log in first';
        }
            
        
     
//        
//        echo $_SESSION['cart']['product'];
//        echo $_SESSION['cart']['product_two'];
//        echo $_SESSION['cart']['product_three'];
        
        ?>
    </body>
</html>
