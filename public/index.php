<?php

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$dispatcher = new \App\Library\Dispatcher($request);
$dispatcher->dispatch();