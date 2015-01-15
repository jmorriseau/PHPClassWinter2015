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
            
            include './POST.php';
            exit();
        }
        
        
           if (isset($_POST['fname'])) {
            echo $_POST['fname'];
        }
        echo '<br />';
        if (isset($_POST['email'])) {
            echo $_POST['email'];
        }
        echo '<br />';
        if (isset($_POST['number'])) {
            echo $_POST['number'];
        }
        
        ?>
    </body>
</html>
