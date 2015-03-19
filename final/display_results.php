<!-- Julie Morriseau -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mailing List Results</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <?php
        include './classes/Validation.class.php';

        $error_msgs = array();
        $success_message = '';
        $validate = new Validation();
        $email = '';
        $phone = '';
        $heard_from = '';
        $contact_via = '';
        $comments = '';


        if (!empty($_POST)) {
            $email = filter_input(INPUT_POST, 'email');
            $phone = filter_input(INPUT_POST, 'phone');
            $heard_from = filter_input(INPUT_POST, 'heard_from');
            $contact_via = filter_input(INPUT_POST, 'contact_via');
            $comments = filter_input(INPUT_POST, 'comments');
            $comments = htmlspecialchars($comments);
            $checked = 'checked="checked"';
            $selected = 'selected="selected"';


            // validate the data
            if (!$validate->emailIsRequired($email)) {
                $error_msgs[] = 'Email is a required field.';
            }

            if (!$validate->emailIsValid($email)) {
                $error_msgs[] = 'This email is <strong>NOT</strong> valid.';
            }

            if (!$validate->phoneIsValid($phone)) {
                $error_msgs[] = 'Please enter your Phone number in format xxx-xxx-xxxx.';
            }

            if (!$validate->heardFromIsValid($heard_from)) {
                $error_msgs[] = 'Please tell us how you heard about us.';
            }


            if (!empty($error_msgs)) {
                $validate->displayErrorMsgs($error_msgs);
                include './index.php';
                exit();
            }

            if (count($error_msgs) == 0) {
                $checkAdd = $validate->addUser($email, $phone, $heard_from, $contact_via, $comments);

                if ($checkAdd == true) {
                    echo '<h1>Account was added.</h1>';
                } else {
                    $error_msgs[] = '<h1>Account add unsuccessful. Please try again.</h1>';
                }
            }
        }
        ?>
        <div id="content">
            <h1>Account Information</h1>

            <label>Email Address:</label>
            <span><?php echo $email ?></span><br />

            <label>Phone:</label>
            <span><?php echo $phone ?></span><br />

            <label>Heard From:</label>
            <span><?php echo $heard_from ?></span><br />

            <label>Contact Via:</label>
            <span><?php echo $contact_via ?></span><br /><br />

            <span>Comments:</span><br />
            <span><?php echo $comments ?></span><br />

        </div>
    </body>
</html>
