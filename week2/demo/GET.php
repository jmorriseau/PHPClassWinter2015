<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <a href="?name=julie&email=test@test.com">test link</a>
        
        <?php
        
        var_dump ($_GET);
        
        //$_GET['name'];
        
        if (isset($_GET['name']) === true) {
            echo $_GET['name'];
        }
        
        echo '<br />';
        
        if (isset($_GET['email'])) {
            echo $_GET['email'];
        }
        
         //echo $_GET['name'], '<br />', $_GET['email'];
    
                 
        ?>
    </body>
</html>