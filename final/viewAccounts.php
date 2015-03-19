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
        $db = new PDO("mysql:host=localhost;dbname=phpclasswinter2015; port=3308;", "root", "");

        $dbs = $db->prepare('select * from account');


        if ($dbs->execute() && $dbs->rowCount() > 0) {

            $results = $dbs->fetchAll(PDO::FETCH_ASSOC);

            echo '<table>';
            echo '<tr>';
            echo '<th>' . 'ID' . '</th>';
            echo '<th>' . 'Email' . '</th>';
            echo '<th>' . 'Phone' . '</th>';
            echo '<th>' . 'Heard from' . '</th>';
            echo '<th>' . 'Contact' . '</th>';
            echo '<th>' . 'Comments' . '</th>';
            echo '</tr>';
            foreach ($results as $value) {
                echo '<tr>';
                echo '<td>' . $value["id"] . '</td>';
                echo '<td>' . $value["email"] . '</td>';
                echo '<td>' . $value["phone"] . '</td>';
                echo '<td>' . $value["heard"] . '</td>';
                echo '<td>' . $value["contact"] . '</td>';
                echo '<td>' . $value["comments"] . '</td>';
                echo '</tr>';

            }
            echo '</table>';
        } else {
            echo 'No results found';
        }
        ?>

    </body>
</html>
