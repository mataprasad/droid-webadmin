<?php
$app->get('/', "controller.home:hello");


$app->get('/home/index', "controller.home:index");
$app->get('/home/list', "controller.home:list");
$app->get('/home/edit', "controller.home:edit");
$app->post('/home/edit', "controller.home:edit_post");
$app->post('/home/add', "controller.home:add_post");
$app->get('/home/delete', "controller.home:delete");