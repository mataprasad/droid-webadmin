<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Query\Builder;

class AttendanceController
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
        return $this->view->render($response, 'attendance/index.php', []);
    }

    public function list(Request $request, Response $response, $args)
    {
        $data=null;
        $query=$request->getQueryParam("query", $default = null);
        if ($query==null) {
            $data = $this->db->table('DtAttendanceLog')->get();
        } else {
            $data = $this->db->table('DtAttendanceLog')
            ->where("EmployeeID", "=",$query)
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
        $data = $this->db->table('DtAttendanceLog')->where("ID", "=", $query)->first();
        
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
        REDIRECT("/attendance/index");
        return;
    }
}
