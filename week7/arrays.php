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
        
        $arr = array();
        
        $arr[0] = 'hello';
        $arr[1] = 'world';
        $arr["cars"] = 'ford';
        
        print_r($arr);
        
        echo $arr[0], ' ', $arr[1], ' ', $arr["cars"];
        
        
        foreach ($arr as $key => $value){
            echo '<br />', $key, '=>', $value;
        }
        
        
        ?>
    </body>
</html>
