<?php
if (isset($_POST['action'])) {
    $action =  $_POST['action'];
} else {
    $action =  'start_app';
    }

switch ($action) {
    case 'start_app':
        $message = 'Enter some data and click on the Submit button.';
        break;
    case 'process_data':
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $error = '';
        
        if (empty($name) || $name == ''){
            $error .= 'Name is a required field. ';
        }
              
        if (empty($email) || $email == ''){
            $error .= 'Email is a required field.';
        }
        else if ( filter_var($email, FILTER_VALIDATE_EMAIL) != FALSE ) {
                echo '<p>this email is valid</p>';
        } else {
                echo '<p>this email is <strong>NOT</strong> valid</p>';
            }
        
        $i = strpos($name, ' ');
        if ($i === false) {
            $message = 'No spaces were found in the name.';
            echo $message;
        }
        
        $first_name = substr($name, 0, $i);
        $last_name = substr($name, $i+1);
        $first_name = ucfirst($first_name);
        $last_name = ucfirst($last_name); 
              
        $message = "Hello $first_name,\n\n" .
           "Thank you for entering this data:\n\n" .
           "Name: $first_name $last_name \n" .
           "Email: $email \n" .
           "Phone: $phone";
            
            

        /*************************************************
         * validate and process the name
         ************************************************/
        // 1. make sure the user enters a name
        // 2. display the name with only the first letter capitalized

        /*************************************************
         * validate and process the email address
         ************************************************/
        // 1. make sure the user enters an email
        // 2. make sure the email address has at least one @ sign and one dot character

        /*************************************************
         * validate and process the phone number
         ************************************************/
        // 1. make sure the user enters at least seven digits, not including formatting characters
        // 2. format the phone number like this 123-4567 or this 123-456-7890

        /*************************************************
         * Display the validation message
         ************************************************/
        

        break;
}
include 'string_tester.php';
?>