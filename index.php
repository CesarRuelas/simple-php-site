<?php
require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('America/Monterrey');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// $log = new Logger('name');
// $log->pushHandler(new StreamHandler('app.txt', Logger::WARNING));
// $log->addWarning('Oh no');

$app = new \Slim\Slim();

$app->get('/', function () use($app) {
    $app->render('index.html');
});

$app->get('/contact', function () use ($app) {
    $app->render('contact.html');
});

$app->run();

?>