<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <?php
        include './functions.php';
        include_once './header.php';
        include './classes/Validation.class.php';
        
        session_start();
        $_SESSION['loggedin'] = false;
        
        $email = '';
        $password = '';
        $error_msgs = array();
        $success_message = array();
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
                
        if ( count($error_msgs) == 0 ) {
            $userPassHash = sha1($userPass);
            
            //check the database
            $checkUser = $validate->checkCredentials($email, $userPassHash);
                        
            if ( $checkUser == true  ) {
                //$success_message[] = '<h1>Login Sucessful</h1>';
                $_SESSION['loggedin'] = true;
                header ('Location: admin.php');
            } else {
                $error_msgs[] = '<h1>Login unsuccessful. Please try again.</h1>';        
            }
        }      
       
    }
        
        ?>
        
        <form action="#" method="post" id="login_form">
            <fieldset>
                <legend><h1>Log in</h1></legend>
                
            <?php
            displayErrorMsgs($error_msgs);
            
            displaySuccessMsgs ($success_message);
            ?>
                
            Email <input type="email" name="email" value="<?php echo $email ?>" /> <br /> <br />  
            Password <input type="password" name="password" value="" /> <br /><br />
                       
            <input type="submit" value="Submit" />           
            </fieldset>
        </form>     
    </body>
</html>
