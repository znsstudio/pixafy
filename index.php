<?php
/**
* Samir Yahyazade @ for companies not for production
* Do not use without permission
*/

require 'config.php';
require 'util/Auth.php';

function __autoload($class) {
    require LIBS . $class .".php";
}


// Load the Bootstrap!
$bootstrap = new Bootstrap();

$bootstrap->init();