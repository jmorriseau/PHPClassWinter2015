<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include './validation.php';
        
        if( !empty($err_msg)) {
            
            include './assignment3week3.php';
            exit();
        }
        
        
        if (isset($_POST['name'])) {
            echo $_POST['name'];
        }
        echo '<br />';
        if (isset($_POST['phone'])) {
            echo $_POST['phone'];
        }
        echo '<br />';
        if (isset($_POST['email'])) {
            echo $_POST['email'];
        }
        echo '<br />';
        if (isset($_POST['zipCode'])) {
            echo $_POST['zipCode'];
        }        
        ?>
    </body>
</html>
