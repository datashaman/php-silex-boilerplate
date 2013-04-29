<?php
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER["REQUEST_URI"])) {
  return false;
}

require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__.'/views',
));

$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => __DIR__.'/logs/development.log'
));

$app->get('/', function() use($app) {
  return $app['twig']->render('hello.html', array(
    'name' => 'World'
  ));
});

$app->get('/goodbye', function() use($app) {
  return $app['twig']->render('goodbye.html', array(
    'name' => 'World'
  ));
});

$app->run();
