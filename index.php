<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once "vendor/autoload.php";
/**
 * Created by PhpStorm.
 * User: A-VE
 * Date: 1/9/2019
 * Time: 10:05 AM
 */

$f3 = Base::instance();

$f3->route('GET /', function() {
    $view = new View;
    echo $view->render('views/home.html');
});

$f3->run();
