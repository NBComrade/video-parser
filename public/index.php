<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$app = new \Slim\App;

require_once '../src/config/defines.php';
require_once '../src/config/services.php';
require_once '../src/config/routes.php';

$app->run();
