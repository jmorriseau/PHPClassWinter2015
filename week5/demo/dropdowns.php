<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $cars = filter_input(INPUT_POST,'cars');
        $selected = 'selected="selected"';
        
        var_dump($cars);
        
        ?>
        
        <form action="#" method="post">            
            <select name="cars">
                <option value="ford" <?php 
                if ($cars == 'ford') {                    
                    echo $selected;
                }
                ?>>Ford</option>
                
                <option value="honda" <?php 
                if ($cars == 'honda') {                    
                    echo $selected;
                }
                ?>>Honda</option>
                
                <option value="kia" <?php 
                if ($cars == 'kia') {                    
                    echo $selected;
                }
                ?>>Kia</option>
                
            </select>  
            <br />
            
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
