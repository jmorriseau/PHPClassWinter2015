
    
        <?php
        
        include_once './models/db.php';
        include_once './views/header.php';
        
        $view = filter_input(INPUT_GET, 'view');
        
        if ($view == 'all'){
            include_once './models/getnames.php';
            include_once './views/all.php';
        }
        else if ($view =='deatils'){
            
            include_once './views/deatils.php';
        }
        
        
        
        include_once './views/footer.php';
        ?>

