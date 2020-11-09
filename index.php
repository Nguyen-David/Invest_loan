<?php


use app\container\Container;

require_once './vendor/autoload.php';

$containerDefinitions = require  'config/container.php';

$container = new Container($containerDefinitions);

$app = new app\main\Application($container);




