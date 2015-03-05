
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Sign Up</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <?php
        
        $email = '';
        $password = '';
        $error_message = '';
        $success_message = '';
        
        if(!empty($_POST)){
            
        $email = filter_input(INPUT_POST,'email');
        $userPass = filter_input(INPUT_POST, 'password');
        
        // validate email entry 
       if ( empty($email) || $email == NULL ) {
           $error_message .= '<p>Email is a required field.</p>'; 
       }
       else if ( filter_var($email, FILTER_VALIDATE_EMAIL) == false ) {
            $error_message .= '<p>This email is <strong>NOT</strong> valid.</p>';
        }
       else {
               $pdo = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3308;", "root", "");
                $dbs = $pdo->prepare('select * from signup where email = :email');  
                $dbs->bindParam(':email', $email, PDO::PARAM_STR);
                
                if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                        $error_message .= '<h1>This email is already in use.</h1>';
                }                
           }
        
        
        //validate password
        if (empty($userPass) || $userPass == NULL){
            $error_message .= '<p>Password is a required field.</p>'; 
        }
        else if ( strlen($userPass) < 4 ) {
        $error_message .= '<p>Password must be at least 5 characters long.</p>';
        }
        
        if(empty($error_message)){
            $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3308;", "root", "");
  
                    $dbs = $db->prepare('insert signup set email = :email, password = :password');  

                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $userPassHash = sha1($userPass);

                    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
                    $dbs->bindParam(':password', $userPassHash, PDO::PARAM_STR);

                    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                            $success_message = '<h1> Set up was successful.</h1>';
                    } else {
                    echo '<h1> Setup was <strong>NOT</strong> successful.</h1>';}
        }
    }
        
        ?>
        
        <form action="#" method="post" id="add_user_form">
            <fieldset>
                <legend><h1>Account Setup</h1></legend>
            
            Email <input type="email" name="email" value="<?php echo $email; ?>" /> <br /> <br />  
            Password <input type="password" name="password" value="" /> <br /><br />
                       
            <input type="submit" value="Submit" />
            
            <?php
              if (!empty($error_message)) {
                 echo $error_message;
                 }
            if (!empty($success_message)){
                echo $success_message;
            }
            ?>
            </fieldset>
        </form>
        
        <a href="login.php">Existing member log in</a>
        
    </body>
</html>
