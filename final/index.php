<!-- Julie Morriseau -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mailing List</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
    </head>
    <body>
        <?php
        $error_msgs = array();
        $success_message = '';
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
        }
        ?>



        <div id="content">
            <h1>Account Sign Up</h1>

            <form action="display_results.php" method="post">

                <fieldset>
                    <legend>Account Information</legend>
                    <label>E-Mail:</label>
                    <input type="text" name="email" value="<?php echo $email ?>" class="textbox"/>
                    <br />

                    <label>Phone Number:</label>
                    <input type="text" name="phone" value="<?php echo $phone ?>" class="textbox"/>
                </fieldset>

                <fieldset>
                    <legend>Settings</legend>

                    <p>How did you hear about us?</p>
                    <input type="radio" name="heard_from" value="Search Engine" <?php
            if ($heard_from == 'Search Engine') {
                echo $checked;
            }
            ?>/>
                    Search engine<br />
                    <input type="radio" name="heard_from" value="Friend" <?php
                    if ($heard_from == 'Friend') {
                        echo $checked;
                    }
            ?>/>
                    Word of mouth<br />
                    <input type=radio name="heard_from" value="Other" <?php
                    if ($heard_from == 'Other') {
                        echo $checked;
                    }
            ?>/>
                    Other<br />

                    <p>Contact via:</p>
                    <select name="contact_via">
                        <option value="email" <?php 
                if ($contact_via == 'email') {                    
                    echo $selected;
                }
                ?>>Email</option>
                        <option value="text" <?php 
                if ($contact_via == 'text') {                    
                    echo $selected;
                }
                ?>>Text Message</option>
                        <option value="phone" <?php 
                if ($contact_via == 'phone') {                    
                    echo $selected;
                }
                ?>>Phone</option>
                    </select>

                    <p>Comments: (optional)</p>
                    <textarea name="comments" rows="4" cols="50"><?php echo $comments; ?></textarea>
                </fieldset>

                <input type="submit" value="Submit" />

            </form>
            <br />
        </div>
    </body>
</html>
