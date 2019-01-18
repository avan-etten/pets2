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
    echo "<h1>My Pets</h1>";
    echo "<a href='order'>Order a Pet</a>";
});

$f3->run();
