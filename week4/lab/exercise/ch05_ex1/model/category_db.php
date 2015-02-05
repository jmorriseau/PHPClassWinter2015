<?php
$category_name = '';

function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $result = $db->query($query);
    return $result;
}

function get_category_name($category_id) {
    global $db;
    $query = "SELECT * FROM categories
              WHERE categoryID = $category_id";
    $category = $db->query($query);
    $category = $category->fetch();
    $category_name = $category['categoryName'];
    return $category_name;
}

if (empty($category_name)) {
    $error = "Invalid category data. Check all fields and try again.";
    //include('error.php');
} else {
    // If valid, add the category to the database
    //require_once('database.php');
    $query = "INSERT INTO categories
                 (categoryName)
              VALUES
                 ('$category_name')";
    $db->exec($query);
}

//// Delete the category from the database
////require_once('database.php');
//$query = "DELETE FROM categories
//          WHERE categoryName = '$category_name'";
//$db->exec($query);
//
//// display the Product List page
////include('index.php');

function delete_category($category_id) {
    global $db;
    $query = "DELETE FROM categories
              WHERE $category_id = '$category_id'";
    $db->exec($query);
}

function add_category($category_name) {
    global $db;
    $query = "INSERT INTO categories
                 (categoryName)
              VALUES
                 ('$category_name')";
    $db->exec($query);
}
?>