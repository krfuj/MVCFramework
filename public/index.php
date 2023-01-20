<?php

/** User: Presley Sakwa 
 * Date 16th Jan 2023
 * PHP MVC Framework
 * 
*/
require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;

$app = new Application(dirname(__DIR__));


$app->router->get('/', 'home');

$app->router->get('/contact', 'Contact');

$app->run();


?>