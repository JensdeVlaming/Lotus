<?php

class ExceptionController extends Controller
{
    public function _404()
    {
        http_response_code(404);
        $this->viewContentOnly("exception/404");
    }

    public function _401()
    {
        http_response_code(401);
        $this->viewContentOnly("exception/401");
    }

    public function _500()
    {
        http_response_code(500);
        $this->viewContentOnly("exception/500");
    }
}
