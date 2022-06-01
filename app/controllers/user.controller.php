<?php

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->registerMiddleware(new AuthMiddleware(["authenticatd"]));
    }

    public function authenticatd() {
        echo "You can view this page because you are logged in! ";
    }
}
