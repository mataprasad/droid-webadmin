<?php

session_start();

require '../../vendor/autoload.php';

require '../config/app-config.php';

require './web-config.php';
require '../views/_CrudGridJs.php';

$app = new \Slim\App($config);

require '../config/di-container.php';

require '../config/controller-locator.php';

require '../config/middleware1.php';

require '../config/auth.php';

require '../config/route.php';

$app->run();
