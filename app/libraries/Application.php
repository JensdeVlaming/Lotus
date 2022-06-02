<?php

class Application {
    public static Application $app;
    public Router $router;
    public Session $session;

    public function __construct()
    {
        self::$app = $this;
        $this->router = new Router();
        $this->session = new Session();
    }

    public static function isGuest() {
        return !self::$app->session->get("user");
    }

    public static function isLoggedIn() {
        if (self::$app->session->get("user") != null) {
            return 1;
        } else {
            return 0;
        }
    }
}