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

    public function hello(Request $request, Response $response, $args)
    {
        //var_dump($args);
        $data= $widgets = $this->db->table('emp')->get();
       // var_dump($data[0]);
        return $this->view->render($response, 'home/index.php', [
            "name" => "Michael",
            "data"=>$data
            //"layout"=>""
        ]);
    }

    public function index(Request $request, Response $response, $args)
    {
        return $this->view->render($response, 'home/index.php', []);
    }

    public function list(Request $request, Response $response, $args)
    {
        $data=null;
        $query=$request->getQueryParam("query", $default = null);
        if ($query==null) {
            $data = $this->db->table('emp')->get();
        } else {
            $data = $this->db->table('emp')->where("ENAME", "like", "".$query."%")->get();
        }
        $model=new stdClass();
        $model->aaData=$data;
        $newResponse = $response->withJson($model);
        return $newResponse;
    }

    public function edit(Request $request, Response $response, $args)
    {
        $data=null;
        $query=$request->getQueryParam("id", $default = null);
        $data = $this->db->table('emp')->where("EMPNO", "=", $query)->first();
        
        $newResponse = $response->withJson( $data);
        return $newResponse;
    }

    public function edit_post(Request $request, Response $response, $args)
    {
        $value = $request->getParsedBody();
        $model=new stdClass();
        $model->Success=true;
        $model->Message="Updated sucessfully.";
        $newResponse = $response->withJson($model);
        return $newResponse;
    }

    public function add_post(Request $request, Response $response, $args)
    {
        $value = $request->getParsedBody();
        $model=new stdClass();
        $model->Success=true;
        $model->Message="Updated sucessfully.From add.";
        $newResponse = $response->withJson($model);
        return $newResponse;
    }

    public function delete(Request $request, Response $response, $args)
    {
        $data=null;
        $query=$request->getQueryParam("id", $default = null);
        REDIRECT("/home/index");
        return;
    }
}
