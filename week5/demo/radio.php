<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $cars = filter_input(INPUT_POST, 'cars');
        var_dump($cars);
        
        $checked = 'checked="checked"';
        ?>
        
        
        <form action="#" method="post">            
           Ford<input type="radio" name="cars" value="ford" <?php 
                if ($cars == 'ford') {                    
                    echo $checked;
                }
                ?> /> <br />
           Honda<input type="radio" name="cars" value="honda" <?php 
                if ($cars == 'honda') {                    
                    echo $checked;
                }
                ?>/> <br />
           Kia<input type="radio" name="cars" value="kia" <?php 
                if ($cars == 'kia') {                    
                    echo $checked;
                }
                ?>/> <br />
            
            
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
