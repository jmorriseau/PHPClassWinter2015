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

    public function emailIsRequired($email) {
        if (empty($email) || $email == NULL) {
            return false;
        } else {
            return true;
        }
    }

    public function emailIsValid($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            return false;
        } else {
            return true;
        }
    }

    public function phoneIsValid($phone) {
        $pattern = '/^\(?([2-9]{1}[0-9]{2})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/';
        if (preg_match($pattern, $phone) != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function heardFromIsValid($heard_from) {
        if (!empty($heard_from)) {
            return true;
        } else {
            return false;
        }
    }

    public function commentsIsValid($comments) {
        if (!empty($comments)) {
            return true;
        } else {
            return false;
        }
    }

    public function displayErrorMsgs($error_msgs) {
        if (is_array($error_msgs) && count($error_msgs) > 0) {
            foreach ($error_msgs as $err) {
                echo '<p>', $err, '</p>';
            }
        }
    }

    public function addUser($email, $phone, $heard_from, $contact_via, $comments) {
        $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3308;", "root", "");

        $dbs = $db->prepare('insert account set email = :email, phone = :phone, heard = :heard_from, contact = :contact_via, comments = :comments');

        $dbs->bindParam(':email', $email, PDO::PARAM_STR);
        $dbs->bindParam(':phone', $phone, PDO::PARAM_STR);
        $dbs->bindParam(':heard_from', $heard_from, PDO::PARAM_STR);
        $dbs->bindParam(':contact_via', $contact_via, PDO::PARAM_STR);
        $dbs->bindParam(':comments', $comments, PDO::PARAM_STR);


        if ($dbs->execute() && $dbs->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}
