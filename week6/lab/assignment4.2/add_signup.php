<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert</title>
    </head>
    <body>
<?php
        
        $error_message = '';
         
         if ( !empty($_POST) ) { 
        $email = filter_input(INPUT_POST,'email');

        $userPass = filter_input(INPUT_POST, 'password');
       // $userPassHash = sha1($userPass);
        
 
        
    // validate email entry 
        if ( empty($email) || $email == NULL ) {
            $error_message .= '<p>Email is a required field.</p>'; }
            
    // validate password 
        if ( empty($userPass) || $userPass == NULL) {
            $error_message .= '<p>Password is a required field.</p>'; }
        else if ( strlen($userPass) < 4 ) {
            $error_message .= '<p>Password must be at least 5 characters long.</p>'; }
        else {
            $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3308;", "root", "");
  
                    $dbs = $db->prepare('insert signup set email = :email, password = :password');  

                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $userPassHash = sha1($userPass);

                    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
                    $dbs->bindParam(':password', $userPassHash, PDO::PARAM_STR);

                    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                            echo '<h1> Set up was successful.</h1>';
                    } else {
                    echo '<h1> Setup was <strong>NOT</strong> successful.</h1>';}
        }
            
    // if an error message exists, go to the add user form
       if ($error_message != '') {
            include('signup.php');
            exit();
        }
	
         }
   
    
?>
    </body>
</html>