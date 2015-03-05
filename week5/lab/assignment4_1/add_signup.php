<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert</title>
    </head>
    <body>
<?php
        $error_message = '';
                     
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'password');
        $userPassHash = sha1($password);
 
        
    // validate email entry 
        if ( empty($email) || $email == NULL ) {
            $error_message .= '<p>Email is a required field.</p>'; }
            
    // validate password 
        if ( empty($password) || $password == NULL) {
            $error_message .= '<p>Password is a required field.</p>'; }
        else if ( strlen($password) < 4 ) {
            $error_message .= '<p>Password must be at least 5 characters long.</p>'; }
                    
    // if an error message exists, go to the add user form
       if ($error_message != '') {
            include('index.php');
            exit();
        }
	

   $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3307;", "root", "");
  
    $dbs = $db->prepare('insert signup set email = :email, password = :password');  

    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    $dbs->bindParam(':password', $password, PDO::PARAM_STR);
    
    
    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
            echo '<h1> Set up was successful.</h1>';
    } else {
    echo '<h1> Setup was <strong>NOT</strong> successful.</h1>';}
    
?>
    </body>
</html>