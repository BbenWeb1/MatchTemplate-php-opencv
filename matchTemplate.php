<?php
namespace Cv ;
use CV\Scalar,CV\Point;
if(!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}
include_once "halper.php";

$dir = dirname(__FILE__).DS;

$src = imread($dir.'img'.DS.'src.png');
$temp =imread($dir.'img'.DS.'temp.jpg');

matchTemplate($src,$temp,$dst,2);

/**extract(\minMaxLoc($dst));

var_dump($minval,$maxval,$minloc,$maxloc);
**/


$Points = maxloc($dst,0.96);
if(false!==$Points){
    $scalar =new Scalar(0,0,255);
    foreach ($Points as $key => $value) {
        rectangleByPoint($src, new Point($value["x"], $value["y"]), new Point($value["x"]+$temp->cols, $value["y"]+$temp->rows), $scalar);
    }
    imwrite($dir.'result.jpg', $src);
    exec($dir.'result.jpg');
