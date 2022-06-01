<?php
    class Controller {
        public array $middlewares = [];
        public string $action = '';

        public function __construct()
        {
            
        }
        public function model($model) { 
            // Rquire model file
            require_once("../app/models/" . $model . ".model.php");
            
            // Instantiate model
            $model = $model."Model";
            return new $model();
        }

        public function view($view, $data = []) {
            if (file_exists("../app/views/" . $view . ".php")) {
                require_once("../app/views/" . $view . ".php");
            } else {
                die("View does not exists.");
            }
        }

        public function redirect($url, $data = []) {
            header("Location: " . $url);
            exit;
        }

        public function registerMiddleware(BaseMiddleware $middleware) {
            $this->middlewares[] = $middleware;
        }

        public function getMiddlewares() {
            return $this->middlewares;
        }
    }