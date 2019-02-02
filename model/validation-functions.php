<?php
/**
 * Created by PhpStorm.
 * User: philbowden
 * Date: 1/31/19
 * Time: 9:17 PM
 */
//turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', TRUE);


/**
 * @param $color check if $color is in the 'colors' array
 * @return bool return true if in array
 */
function validColor($color)
{
    global $f3;
    return in_array($color, $f3->get('colors'));
}

function validString($animal)
{
    if($animal != "")
    {
        if(ctype_alpha($animal))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}


