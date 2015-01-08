<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>
        <?php
        $myvar = filter_input(INPUT_GET, 'p');
        
         if ( $myvar === '1' ) {
            echo 'Num 1'; 
         } else if ( $myvar === '2' ) {
            echo 'Num 2';
         } else {
            echo 'my page title';
         } 
         ?>
        </h1>
    </body>
</html>
