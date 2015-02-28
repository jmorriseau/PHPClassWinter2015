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
       
        
        <form action="#" method="post">
            
        <?php
        $state_selected = filter_input(INPUT_POST,'states');
        //$selected = 'selected="selected"';
            
        include './include_states.php';
        
        echo '<select name="states">';
        foreach($states as $key => $value){
            if($state_selected == $key){
            echo '<option value="',$key,'" selected="selected">',$value,'</option>';      
            } else {
               echo '<option value="',$key,'">',$value,'</option>';  
            }
            
        }  
        echo '</select>';
       
        
        ?>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
