<?php
$container['controller.home'] = function($container) {
    return new HomeController($container['view'],$container['db']);
};

$container['controller.employee'] = function($container) {
    return new EmployeeController($container['view'],$container['db']);
};

$container['controller.attendance'] = function($container) {
    return new AttendanceController($container['view'],$container['db']);
};

$container['controller.emp_location'] = function($container) {
    return new EmployeeLocationController($container['view'],$container['db']);
};

$container['controller.location'] = function($container) {
    return new LocationController($container['view'],$container['db']);
};

