<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Query\Builder;

class HomeController
{

    protected $view;
    protected $db;

    public function __construct($view, $db)
    {
        $this->view = $view;
        $this->db = $db;
    }

    public function index(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'home/index.php', []);
    }

    public function login(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'home/login.php', ["layout"=>""]);
    }

    public function login_post(Request $request, Response $response, $args)
    {
        $_SESSION["LOOGED_USER"]="null";
        REDIRECT("/");
        return;
    }

    public function log_out(Request $request, Response $response, $args)
    {
        $_SESSION["LOOGED_USER"]=null;
        REDIRECT("/");
        return;
    }
}
