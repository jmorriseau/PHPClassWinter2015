<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Read</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>
    <body>
        <?php
 $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3307;", "root", "");
  
 $dbs = $db->prepare('select * from users');  
        
    
    if ( $dbs->execute() && $dbs->rowCount() > 0 ) {
          
        $results = $dbs->fetchAll(PDO::FETCH_ASSOC);
               
        echo '<table>';
        echo '<tr>';
        echo '<th>'. 'Row Number'. '</th>';
        echo '<th>'. 'Full Name'. '</th>';
        echo '<th>'. 'Email'. '</th>';
        echo '<th>'. 'Phone Number'. '</th>';
        echo '<th>'. 'Zip Code'. '</th>';
        echo '</tr>';   
        $i = 1;
        foreach ($results as $value) { 
            echo '<tr>';
            echo '<td>'. $i. '</td>';
            echo '<td>'. $value["fullname"]. '</td>';
            echo '<td>'. $value["email"]. '</td>';
            echo '<td>'. $value["phone"]. '</td>';
            echo '<td>'. $value["zip"]. '</td>';
            echo '</tr>';
            $i++;
        }
        echo '</table>';
        
    } else {
        echo 'No results found';
    }
           
        
        ?>
    </body>
</html>