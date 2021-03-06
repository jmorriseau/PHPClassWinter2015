
<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Sign Up</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <?php
        include './functions.php';
        include_once './header.php';
        include './classes/Validation.class.php';
        
        $email = '';
        $password = '';
        $error_msgs = array();
        $success_message = '';
        $validate = new Validation();
        
        if(!empty($_POST)){
            
        $email = filter_input(INPUT_POST,'email');
        $userPass = filter_input(INPUT_POST, 'password');
        
        // validate the data
        if (!$validate->emailIsRequired ($email)){
            $error_msgs[] = 'Email is a required field.';
        }
        
        if ( !$validate->emailIsValid($email) ) {
            $error_msgs[] = 'This email is <strong>NOT</strong> valid.';
        }
        
        if (!$validate->passwordIsRequired($userPass)){
            $error_msgs[] = 'Password is a required field.';
        }
        
        if (!$validate->passwordValidLength ($userPass)) {
            $error_msgs[] = '<p>Password must be at least 5 characters long.</p>';
        }
        
        if (!$validate->emailExists($email) ) {
           $error_msgs[] = 'This email is already in use.';                         
           }
        
        if ( count($error_msgs) == 0 ) {
            $userPassHash = sha1($userPass);
                
            //add to the database
            $addUser = $validate->addUser($email, $userPassHash);
                        
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
    </body>
</html>
