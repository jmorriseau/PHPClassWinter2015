<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        if (isset($_POST['fname'])) {
            echo $_POST['fname'];
        }
        echo '<br />';
        if (isset($_POST['email'])) {
            echo $_POST['email'];
        }
        
        ?>
    </body>
</html>
