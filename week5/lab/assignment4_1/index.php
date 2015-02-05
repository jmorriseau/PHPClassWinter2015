<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Setup</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        
        <?php
        
        if (!empty($error_message)) {
            echo $error_message;
        } ?>
        
                
        <form action="add_signup.php" method="post" id="add_user_form">
            <fieldset>
                <legend><h1>Account Setup</h1></legend>
            
            Email <input type="email" name="email" value="" /> <br /> <br />  
            Password <input type="password" name="password" value="" /> <br /><br />
                       
            <input type="submit" value="submit" />
            </fieldset>
        </form>
        
        
      
    </body>
</html>