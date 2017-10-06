<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Query\Builder;

class EmployeeController
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
        return $this->view->render($response, 'employee/index.php', []);
    }

    public function list(Request $request, Response $response, $args)
    {
        $data=null;
        $query=$request->getQueryParam("query", $default = null);
        if ($query==null) {
            $data = $this->db->table('DtEmployee')->get();
        } else {
            $data = $this->db->table('DtEmployee')->where("FirstName", "like", "".$query."%")
            ->orWhere("LastName", "like", "".$query."%")
            ->orWhere("EmployeeID", "=",$query)
            ->orWhere("Mobile", "=",$query)
            >get();
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
        $data = $this->db->table('DtEmployee')->where("ID", "=", $query)->first();
        
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
        REDIRECT("/employee/index");
        return;
    }
}
