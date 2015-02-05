<?php include '../view/header.php'; ?>
<div id="main">

    <h1 class="top">Category List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>     
            <?php foreach ($categories as $category) : ?>
            <tr>
                <td>               
                    <?php echo $category['categoryName']; ?>               
                </td>
                <td>  
                    <form action="index.php" method="post" id="delete_category_form">
                    <input type="hidden" name="action" value="delete_category" />
                    <input type="submit" value="Delete" />
                    <input type="hidden" value="<?php echo $category['categoryName']; ?>" name="category_name" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>
    <br />

<!--    <h2>Add Category</h2>
    
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_category" />
          
            Category Name<input type="input" name="category_name" />&nbsp;<br />
            Category ID<input type="input" name="category_id" />&nbsp;
            <input type="submit" value="Add" />
    </form>
    -->
    <form action="index.php" method="post" id="add_category_form">
        <input type="hidden" name="action" value="add_category" />

        
        <label>Category Name:</label>
        <input type="input" name="category_name" />
        <br />
       
        <input type="submit" value="Add Category" />
    </form>
    
    <p><a href="index.php?action=list_products">List Products</a></p>

</div>
<?php include '../view/footer.php'; ?>