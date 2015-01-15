<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
     <?php
            
        $product_description = '';
        $list_price_formatted = '';
        $discount_percent_formatted = '';  
        $discount_formatted = '';
        $discount_price_formatted = '';
        $error_message = '';
            
        if (!empty ($_POST)){
            $product_description = $_POST['product_description'];
            $list_price_formatted = $_POST['list_price'];
            $discount_percent_formatted = $_POST['discount_percent'];
        }
        
        if (!is_string($product_description) || empty($product_description)) {
             $error_message .= '<p>Please enter a product description.</p>';            
            }
        
        if (!is_numeric($list_price_formatted) || empty($list_price_formatted)) {
             $error_message .= '<p>Please enter a number</p>';                    
            }
        
        if (!is_numeric($discount_percent_formatted) || empty($discount_percent_formatted)) {
             $error_message .= '<p>Please enter a number</p>';    
            }
            
        if (!empty($error_message))  {
             echo $error_message;                        
             include './index.php';
             exit();
         } 
         
        $discount_formatted = $list_price_formatted * $discount_percent_formatted * 0.01;    
        $discount_price_formatted = $list_price_formatted - $discount_formatted;
      
        ?>
   
        
        
    <div id="content">
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo $product_description; ?></span><br />

        <label>List Price:</label>
        <span><?php echo '$'.$list_price_formatted; ?></span><br />

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent_formatted.'%'; ?></span><br />

        <label>Discount Amount:</label>
        <span><?php echo '$'.$discount_formatted; ?></span><br />

        <label>Discount Price:</label>
        <span><?php echo '$'.$discount_price_formatted; ?></span><br />

        <p>&nbsp;</p>
        
    </div>
</body>
</html>