<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validation
 *
 * @author 001305466
 */
class Validation {
 
public function emailIsRequired( $email ) {
     if ( empty($email) || $email == NULL ) {
            return false;
        } 
        else {
            return true;
        }
}

public function emailIsValid ($email){
       if ( filter_var($email, FILTER_VALIDATE_EMAIL) == false ) {
            return false;
        }
        else {
            return true;
        }
}

public function passwordIsRequired ($userPass){
    if (empty($userPass) || $userPass == NULL){
            return false;
        }
       
        else {
            return true;
        }
}

public function passwordValidLength ($userPass){
    if ( strlen($userPass) < 5 ) {
            return false;
        }
        else {
            return true;
        }
}
               
public function displayErrorMsgs( $error_msgs ) {
     if ( is_array($error_msgs) && count($error_msgs) > 0 ) {
        foreach ($error_msgs as $err) {
          echo '<p>', $err, '</p>'; 
        }                    
    }
}

public function displaySuccessMsgs( $success_message) {
    if (is_array($success_message) && count($success_message) > 0){
        foreach ($success_message as $success_msg){
        echo '<p>', $success_msg, '</p>';
        }
    }
}

public function checkCredentials($email, $userPassHash){    
                $pdo = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3308;", "root", "");
                $dbs = $pdo->prepare('select * from signup where email = :email and password = :password');  
                $dbs->bindParam(':email', $email, PDO::PARAM_STR);
                $dbs->bindParam(':password', $userPassHash, PDO::PARAM_STR);
                
                if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                    return true;
                } 
                else {
                    return false;
                }
    
}

public function emailExists($email){
                $pdo = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3308;", "root", "");
                $dbs = $pdo->prepare('select * from signup where email = :email');  
                $dbs->bindParam(':email', $email, PDO::PARAM_STR);
                
                if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
                    return false;
                } 
                else {
                    return true;
                }
    
}

public function addUser($email, $userPassHash){
                $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3308;", "root", "");

                $dbs = $db->prepare('insert signup set email = :email, password = :password');

                $dbs->bindParam(':email', $email, PDO::PARAM_STR);
                $dbs->bindParam(':password', $userPassHash, PDO::PARAM_STR);

                if ($dbs->execute() && $dbs->rowCount() > 0) {
                   // $success_message = '<h1> Set up was successful.</h1>';
                    return true;
                } else {
                   // echo '<h1> Setup was <strong>NOT</strong> successful.</h1>';
                    return false;
                }
}










}
