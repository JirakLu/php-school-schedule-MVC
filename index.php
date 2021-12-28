<?php
session_start();

if (!isset($_SESSION['id']))
    $_SESSION['login'] = 'jiraklu19';

//Initializing
mb_internal_encoding('UTF-8');
require_once("./Models/helpers/fetch.php");

spl_autoload_register(function ($classname) {
    if (preg_match('/Controller$/', $classname)) {
        require_once("./Controllers/$classname" . ".class.php");
    } else if (preg_match('/Model$/', $classname)) {
        require_once("./Models/$classname" . ".class.php");
    } else {
        require_once("./ScheduleClasses/$classname" . ".class.php");
    }
});

$router = new RouterController();
$router->process(array($_SERVER['REQUEST_URI']));
$router->renderView();
