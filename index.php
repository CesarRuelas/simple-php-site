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
})->name('home');

$app->get('/contact', function () use ($app) {
    $app->render('contact.twig');
})->name('contact');

$app->post('/contact', function () use ($app) {
	$name = $app->request->post('name');
	$email = $app->request->post('email');
	$msg = $app->request->post('msg');

	if (!empty($name) && !empty($email) && !empty($msg)) {
		$cleanName = filter_var($name, FILTER_SANITIZE_STRING);
		$cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
		$cleanMsg = filter_var($msg, FILTER_SANITIZE_STRING);
	} else {
		//message the user there was a problem
		$app->redirect('/contact');
	}
});

$app->run();

?>