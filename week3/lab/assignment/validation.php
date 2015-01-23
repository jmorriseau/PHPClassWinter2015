
        <?php
        
        $name = '';
        $phone = 0;
        $email = '';
        $zipCode = 0;
        $err_msg = '';
        
        if (!empty ($_POST)){
            
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $zipCode = $_POST['zipCode'];
        }
            if (!is_string($name) || empty($name)) {
                $err_msg .= '<p>Please enter a name.</p>';                
            }
            if (!is_numeric($phone) || empty($phone)) {
                $err_msg .= '<p>Please enter a phone number.</p>';                
            }
            if (!is_string($email) || empty($email)) {
                $err_msg .= '<p>Please enter an email.</p>';                
            }
            if (!is_numeric($zipCode) || empty($zipCode)) {
                $err_msg .= '<p>Please enter a ZIP Code.</p>';                
            }
            
            if (!empty($err_msg)){
            echo '<h1>', $err_msg, '</h1>';
        }
        ?>

