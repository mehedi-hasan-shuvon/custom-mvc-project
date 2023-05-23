<?php 

    // require_once 'core/App.php';
    // require_once 'core/Controller.php';


    // create a autoload function to load all the classes in the core folder
    spl_autoload_register(function($className) {
        require_once 'core/' . $className . '.php';
    });


?>