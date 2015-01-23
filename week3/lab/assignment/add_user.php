    <?php
// Get the product data
$name = '';
$phone = '';
$email = '';
$zipCode = '';
    
if (!empty ($_POST)){
     $name = $_POST['name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];     
     $zipCode = $_POST['zipCode']; 
    }

// Validate inputs
if (empty($name) || empty($phone) || empty($email) || empty($zipCode) ) {
    echo $error = "Invalid product data. Check all fields and try again.";
} else {
    // If valid, add the user to the database
    require_once('database.php');
    $query = "INSERT INTO users
                 (name, phone, email, zipCode)
              VALUES
                 ('$name', '$phone', '$email', '$zipCode')";
    $db->exec($query);

    // Display the Product List page
    include('index.php');
}
?>