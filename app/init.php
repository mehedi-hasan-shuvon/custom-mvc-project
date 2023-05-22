<?php 
    require_once 'config/config.php';

    // require_once 'core/App.php';
    // require_once 'core/Controller.php';
    // require_once 'core/Database.php';
    
    // create a autoload function to load all the classes in the core folder
    spl_autoload_register(function($className) {
        require_once 'core/' . $className . '.php';
    });
    
?>