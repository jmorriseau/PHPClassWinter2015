<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert</title>
    </head>
    <body>
<?php
        $error_message = '';
                     
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone']; 
        $zip = $_POST['zip']; 
        
    // validate user entry 
        if ( empty($fullname) || $fullname == NULL ) {
            $error_message .= '<p>Full name is a required field.</p>'; }
        
    // validate email entry 
        if ( empty($email) || $email == NULL ) {
            $error_message .= '<p>Email is a required field.</p>'; }
            
    // validate phone 
        if ( empty($phone) || $phone == NULL) {
            $error_message .= '<p>Phone is a required field.</p>'; }
        else if ( !is_numeric($phone) )  {
            echo $phone;
            $error_message .= '<p>Phone must be a valid number.</p>'; }
        else if ( strlen($phone) != 10 ) {
            $error_message .= '<p>Phone number must be 10 digits long.</p>'; }
            
    // validate zip code
        if ( empty ($zip) || $zip == NULL ) {
            $error_message .= '<p>ZIP Code is a required field.'; }
        else if ( !is_numeric($zip)) {
            $error_message .= '<p>ZIP Code must be a valid number.</p>'; }
    else if ( strlen($zip) != 5) {
            $error_message .= '<p> ZIP Code must be 5 digits long.</p>'; }
            
    // if an error message exists, go to the add user form
       if ($error_message != '') {
            include('add_user_form.php');
            exit();
        }
	

   $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3307;", "root", "");
  
    $dbs = $db->prepare('insert users set fullname = :fullname, email = :email, phone = :phone, zip = :zip');  
    
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $zip = $_POST['zip'];
    
    $dbs->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $dbs->bindParam(':email', $email, PDO::PARAM_STR);
    $dbs->bindParam(':phone', $phone, PDO::PARAM_STR);
    $dbs->bindParam(':zip', $zip, PDO::PARAM_STR);
    
    
    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
            echo '<h1> User was added.</h1>';
    } else {
    echo '<h1> User <strong>NOT</strong> added.</h1>';}
    
?>
    </body>
</html>