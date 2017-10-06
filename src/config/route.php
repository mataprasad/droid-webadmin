<?php
$app->get('/', "controller.home:index");
$app->get('/login', "controller.home:login");
$app->post('/login', "controller.home:login_post");
$app->get('/log-out', "controller.home:log_out");

$app->get('/employee/index', "controller.employee:index");
$app->get('/employee/list', "controller.employee:list");
$app->get('/employee/edit', "controller.employee:edit");
$app->post('/employee/edit', "controller.employee:edit_post");
$app->post('/employee/add', "controller.employee:add_post");
$app->get('/employee/delete', "controller.employee:delete");

$app->get('/attendance/index', "controller.attendance:index");
$app->get('/attendance/list', "controller.attendance:list");
$app->get('/attendance/edit', "controller.attendance:edit");
$app->post('/attendance/edit', "controller.attendance:edit_post");
$app->post('/attendance/add', "controller.attendance:add_post");
$app->get('/attendance/delete', "controller.attendance:delete");

$app->get('/emp-location/index', "controller.emp_location:index");
$app->get('/emp-location/list', "controller.emp_location:list");
$app->get('/emp-location/edit', "controller.emp_location:edit");
$app->post('/emp-location/edit', "controller.emp_location:edit_post");
$app->post('/emp-location/add', "controller.emp_location:add_post");
$app->get('/emp-location/delete', "controller.emp_location:delete");

$app->get('/location/index', "controller.location:index");
$app->get('/location/list', "controller.location:list");
$app->get('/location/edit', "controller.location:edit");
$app->post('/location/edit', "controller.location:edit_post");
$app->post('/location/add', "controller.location:add_post");
$app->get('/location/delete', "controller.location:delete");