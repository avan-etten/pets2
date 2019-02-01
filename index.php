<?php
//turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', TRUE);

//require autoload
require_once "vendor/autoload.php";
/**
 * Created by PhpStorm.
 * User: A-VE
 * Date: 1/9/2019
 * Time: 10:05 AM
 */
//create an instance of the base class
$f3 = Base::instance();

//set debug level
$f3->set('DEBUG', 3);

$f3->set('colors', array('pink','green','blue'));

require_once ('model/validation-functions.php');

$f3->route('GET /', function() {
    echo "<h1>My Pets</h1>";
    echo "<a href='order'>Order a Pet</a>";
});

$f3->route('GET|POST /order',

    function($f3) {

        $_SESSION = array();

        if(isset($_POST['animal'])){

            $animal = $_POST['animal'];
            if(validString($animal)){
                $_SESSION['animal']=$animal;
                $f3->reroute('/order2');
            }
        }
        else{
            $f3->set("errors['animal']", "Please enter an animal.");
        }

        $template = new Template();
        echo $template->render('views/form1.php');
});

$f3->route('GET|POST /order2',

    function($f3) {

    $_SESSION = array();

    if(isset($_POST['color'])){

        $color = $_POST['color'];
        if(validColor($color)) {
            $_SESSION['color'] = $color;
            $f3->reroute('/results');
        }
    }
    else{
        $f3->set("errors['color']","Please enter a valid color.");
    }

    //$f3->set('SESSION.animal', $f3->get('POST.animal'));
    $template = new Template();
    echo $template->render('views/form2.html');
});

$f3->route('POST /results', function($f3) {
    $f3->set('SESSION.color', $f3->get('POST.color'));
    $template = new Template;
    echo $template->render('views/results.html');
});

//Define a route that accepts a parameter for animal type
$f3->route('GET /@animal', function($f3, $params)
{
    switch ($params['animal'])
    {
        case 'dog':
            echo 'Woof!';
            break;
        case 'chicken':
            echo 'Cluck!';
            break;
        case 'cat':
            echo 'Meow!';
            break;
        case 'cow':
            echo 'Moo!';
            break;
        case 'pig':
            echo 'Oink!';
            break;
        default:
            echo $f3->error(404);
    }

});

$f3->run();
