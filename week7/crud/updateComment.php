<?php
    include './functions.php';
    
    $id = filter_input(INPUT_POST, 'id');    
    $isupdated = filter_input(INPUT_POST, 'update');    
    
    $error_msgs = array();
    $sucess_msg = '';
    
    $email = '';
    $fullname = '';
    $phone = '';
    $comments = '';
    
    
    if ( !empty($_POST) && !empty($isupdated) ) {
        
        $fullname = filter_input(INPUT_POST, 'fullname');
        $email = filter_input(INPUT_POST, 'email');
        $comments = filter_input(INPUT_POST, 'comments');
        $phone = filter_input(INPUT_POST, 'phone');
        
        
        if ( !emailIsValid($email) ) {
            $error_msgs[] = 'Email is not Valid.';
        }
        
        if ( !fullNameIsValid($fullname) ) {
            $error_msgs[] = 'Please enter your name.';
        }
        
        if ( !phoneIsValid($phone) ) {
            $error_msgs[] = 'Please enter your Phone number in format xxx-xxx-xxxx.';
        }
        
        
         if ( count($error_msgs) == 0 ) {
            //add to database
            
            $updatedComments = updateComments($id, $fullname, $email, $comments, $phone );
            
            if ( $updatedComments === true  ) {
                $sucess_msg = 'Comments were updated.';
            } else {
                $error_msgs[] = 'Comments were NOT updated.';
            }
             
        }
        
        
    }
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        $comment = getComment($id);
        
        if ( count($comment) === 0) {
            echo 'No comment found';
            die();
        }
        
        if ( count($comment) > 0) {
        
            $email = $comment["email"];
            $fullname = $comment["name"];
            $phone = $comment["phone"];
            $comments = $comment["comments"];
                        
        }
        print_r($comment);
        
        ?>
        
         <div class="error_message">
            <?php            
                displayErrorMsgs($error_msgs);            
            ?>
        </div>
        
        <div>
            <?php 
                displaySucessMsg($sucess_msg);
            ?>
        </div>
         <form action="#" method="post">
            <fieldset>
                <legend><h2>Update Comments</h2></legend>
                <p>
                    <label>E-Mail:</label>
                    <input type="text" name="email" value="<?php echo $email; ?>" />
                </p>
                <p>
                    <label>Name:</label>
                    <input type="text" name="fullname" value="<?php echo $fullname; ?>" />
                </p>
                
                 <p>
                    <label>Phone:</label>
                    <input type="text" name="phone" value="<?php echo $phone; ?>" />
                </p>
                <p>Comments: (optional)</p>
                <textarea name="comments" rows="4" cols="50"><?php echo $comments; ?></textarea>
                
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <p> <input type="submit" name="update" value="Submit" /> </p>
            </fieldset>
        </form> 
        
        
        
    </body>
</html>