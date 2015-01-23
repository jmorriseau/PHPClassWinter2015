<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php       
        require_once('database.php');
            
        $name = '';
        $phone = '';
        $email = '';
        $zipCode = '';
               
        if (!empty ($_POST)){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];     
        $zipCode = $_POST['zipCode']; 
        }
        ?>
        
        <form action="post_process.php" method="post">
            
            Name: <input name="name" type="text" value="<?php echo $name; ?>" />
            <br />
            Phone: <input name="phone" type="number" value="<?php echo $phone; ?>" />
            <br />
            Email: <input name="email" type="text" value="<?php echo $email; ?>" />
            <br />
            ZIP Code: <input name="zipCode" type="number" value="<?php echo $zipCode; ?>" />
            
            
            <input type="submit" value="submit" />
        </form>
        
        
      
    </body>
</html>