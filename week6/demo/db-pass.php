<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        
            if ( !empty($_POST) ) {
                
                $userPass = filter_input(INPUT_POST, 'pass');
                $userPassHash = sha1($userPass);
                //$passcode = sha1('hidden');
                $passcode = '99d72c7fc3e2e145870beab37c0b70e343ea9c3b';
                if ( $passcode == $userPassHash ) {
                    echo '<p>Passcode acepted</p>';
                } else {
                    echo '<p>Passcode not acepted</p>';
                }
                
            }
        ?>
        
        <form action="#" method="post">
            
           Passcode: <input type="password" name="pass" value="" />
            
            <input type="submit" value="submit" />
            
        </form>
        
    </body>
</html>