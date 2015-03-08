<p><a href="signupnow.php">Sign Up</a>
<a href="login.php">Existing member log in</a></p>

<?php    
if ( isset($_SESSION['loggedin']) &&
        $_SESSION['loggedin'] === true ) {
   echo '<a href="?logout=1">Logout</a>';
}
    $logout = filter_input(INPUT_GET, 'logout');
   
    if ( $logout == 1 ) {
       $_SESSION['loggedin'] = false;
    }
?>