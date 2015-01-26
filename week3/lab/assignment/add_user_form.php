<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        
        if (!empty($error_message)) {
            echo $error_message;
        } ?>
        
                
        <form action="add_user.php" method="post" id="add_user_form">
            
            Name: <input name="fullname" type="text" value="" />
            <br />
            Email: <input name="email" type="text" value="" />
            <br />
            Phone Number: <input name="phone" type="number" value="" />
            <br />
            ZIP Code: <input name="zip" type="number" value="" />
            
            
            <input type="submit" value="submit" />
        </form>
        
        
      
    </body>
</html>