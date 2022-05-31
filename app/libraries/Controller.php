<?php
    class Controller {
        public static function model($model) { 
            // Rquire model file
            require_once("../app/models/" . $model . ".model.php");
            
            // Instantiate model
            $model = $model."Model";
            return new $model();
        }

        public static function view($view, $data = []) {
            if (file_exists("../app/views/" . $view . ".php")) {
                require_once("../app/views/" . $view . ".php");
            } else {
                die("View does not exists.");
            }
        }
    }