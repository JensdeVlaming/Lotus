<?php

require_once("BaseMiddleware.php");

class AuthMiddleware extends BaseMiddleware
{

    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                //Send a 405 Method Not Allowed header.
                http_response_code(401);
                Application::$app->controller->view("/exception/401");
                //Halt the script's execution.
                exit;
            }
        }
    }
}
