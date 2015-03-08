
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Sign Up</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <?php
        include './functions.php';
        
        $email = '';
        $password = '';
        $error_msgs = array();
        $success_message = '';
        
        if(!empty($_POST)){
            
        $email = filter_input(INPUT_POST,'email');
        $userPass = filter_input(INPUT_POST, 'password');
        
        // validate the data
        if (!emailIsRequired ($email)){
            $error_msgs[] = 'Email is a required field.';
        }
        
        if ( !emailIsValid($email) ) {
            $error_msgs[] = 'This email is <strong>NOT</strong> valid.';
        }
        
        if (!passwordIsRequired($userPass)){
            $error_msgs[] = 'Password is a required field.';
        }
        
        if (!passwordValidLength ($userPass)) {
            $error_msgs[] = '<p>Password must be at least 5 characters long.</p>';
        }
        
        if (!emailExists($email) ) {
           $error_msgs[] = 'This email is already in use.';                         
           }
        
        if ( count($error_msgs) == 0 ) {
            $userPassHash = sha1($userPass);
                
            //add to the database
            $addUser = addUser($email, $userPassHash);
                        
            if ( $addUser == true  ) {
                $success_message[] = '<h1>Set up was successful.</h1>';
            } else {
                $error_msgs[] = '<h1>Login unsuccessful. Please try again.</h1>';        
            }      
        }
    }
        
        ?>
        
        <form action="#" method="post" id="add_user_form">
            <fieldset>
                <legend><h1>Account Setup</h1></legend>
                
            <?php
            displayErrorMsgs($error_msgs);
            
            displaySuccessMsgs ($success_message);
            ?>
                
            Email <input type="email" name="email" value="<?php echo $email; ?>" /> <br /> <br />  
            Password <input type="password" name="password" value="" /> <br /><br />
                       
            <input type="submit" value="Submit" />
            
            
            </fieldset>
        </form>
        
        <a href="login.php">Existing member log in</a>
        
    </body>
</html>
