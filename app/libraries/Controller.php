<?php
class Controller
{
    public array $middlewares = [];
    public string $action = '';

    public function __construct()
    {
    }
    public function model($model)
    {
        // Rquire model file
        require_once("../app/models/" . $model . ".model.php");

        // Instantiate model
        $model = $model . "Model";
        return new $model();
    }

    public function viewOnly($view, $data = [])
    {
        // if (file_exists("../app/views/" . $view . ".php")) {
        //     require_once("../app/views/" . $view . ".php");
        // } else {
        //     die("View does not exists.");
        // }
        ob_start();
        if (file_exists("../app/views/" . $view . ".php")) {
            include_once("../app/views/" . $view . ".php");
        } else {
            die("View does not exists.");
        }
        return ob_get_clean();
    }

    public function view($view, $data = [])
    {
        if (file_exists("../app/views/" . $view . ".php")) {
            $layoutContent = $this->layoutContent();
            $headerContent = $this->headerContent();
            $footerContent = $this->footerContent();
            $viewContent = $this->viewOnly($view, $data);

            $view = str_replace("{{content}}", $viewContent, $layoutContent);
            $view = str_replace("{{header}}", $headerContent, $view);
            $view = str_replace("{{footer}}", $footerContent, $view);

            echo $view;
        } else {
            die("View does not exists.");
        }
    }

    public function viewContentOnly($view, $data = [])
    {
        if (file_exists("../app/views/" . $view . ".php")) {
            $layoutContent = $this->layoutContent();
            // $headerContent = $this->headerContent();
            // $footerContent = $this->footerContent();
            $viewContent = $this->viewOnly($view, $data);

            $view = str_replace("{{content}}", $viewContent, $layoutContent);
            $view = str_replace("{{header}}", "", $view);
            $view = str_replace("{{footer}}", "", $view);

            echo $view;
        } else {
            die("View does not exists.");
        }
    }

    protected function layoutContent()
    {
        ob_start();
        include_once("../app/views/includes/layout.php");
        return ob_get_clean();
    }

    protected function headerContent()
    {
        ob_start();
        include_once("../app/views/includes/header.php");
        return ob_get_clean();
    }

    protected function footerContent()
    {
        ob_start();
        include_once("../app/views/includes/footer.php");
        return ob_get_clean();
    }


    public function redirect($url, $data = [])
    {
        header("Location: " . $url);
        exit;
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares()
    {
        return $this->middlewares;
    }

    public function getInitials($firstName, $lastName)
    {
        $firstName = explode(" ", $firstName);
        $lastName = explode(" ", $lastName);
        $initials = substr($firstName[0], 0, 1) . substr($lastName[count($lastName) - 1], 0, 1);

        return $initials;
    }
}
