

<?php    
if ( isset($_SESSION['loggedin']) &&
        $_SESSION['loggedin'] === true ) {
   echo '<a href="?logout=1">Logout</a>';
} else {
    echo '<a href="signupnow.php">Sign Up</a><br />
           <a href="login.php">Existing member log in</a>';
}
    $logout = filter_input(INPUT_GET, 'logout');
   
    if ( $logout == 1 ) {
       $_SESSION['loggedin'] = false;
    }
    
?>