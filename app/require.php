<?php
    // Rquire libraries from folder libraries
    // require_once("libraries/Router.php");
    require_once("libraries/Application.php");
    require_once("libraries/Model.php");
    require_once("libraries/Controller.php");
    require_once("libraries/Database.php");
    require_once("libraries/Router.php");
    require_once("libraries/Session.php");

    foreach (glob("../app/middlewares/*.php") as $filename) {
        require_once($filename);
    }

    require_once("config/config.php");

    require_once('routes.php');
    
    // Instantiate core class
    // $init = new Application();

?>