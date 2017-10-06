<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->add(function (Request $request, Response $response, callable $next) {
    $uri = $request->getUri();
    $path = $uri->getPath();
    if (!isset($_SESSION["LOOGED_USER"]) && $path != '/login') {
        
        return $this['view']->render($response, 'home/login.php', ["layout"=>""]);
    }
    return $next($request, $response);
});
