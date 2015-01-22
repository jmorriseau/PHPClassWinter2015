<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $category_name = '';
        
        $category_name = $_POST['category_name'];
        
        // Validate inputs
if (empty($category_name)) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, add the category to the database
    require_once('database.php');
    $query = "INSERT INTO categories
                 (categoryName)
              VALUES
                 ('$category_name')";
    $db->exec($query);

    // Display the Product List page
    include('category_list.php');
}
        
        ?>
     
    </body>
</html>
