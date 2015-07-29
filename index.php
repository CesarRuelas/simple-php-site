<?php

require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('America/Monterrey');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// $log = new Logger('name');
// $log->pushHandler(new StreamHandler('app.txt', Logger::WARNING));
// $log->addWarning('Oh no');

$app = new \Slim\Slim(array(
	'view' => new \Slim\Views\Twig()
));

$view = $app->view();

$view->parserOptions = array(
    'debug' => true
);

$view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);

$app->get('/', function () use($app) {
    $app->render('about.twig');
});

$app->get('/contact', function () use ($app) {
    $app->render('contact.twig');
});

$app->run();

?>