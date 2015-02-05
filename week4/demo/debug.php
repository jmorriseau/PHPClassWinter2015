<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        $page = filer_input(INPUT_GET, 'page');
        $post = filer_input(INPUT_POST, 'email');
        
     
        $currentPage = '';
        
        
        if ( $page == $currentPage ) {
            
            echo 'this is the right page';
            
        }
        
        echo 'this is the wrong page';
        
        var_dump($page);
        
        
        ?>
    </body>
</html>