<?php
session_start();
require '../loadTemplate.php';
require '../DatabaseTable.php';
require '../connect.php';
require '../controllers/adminsController.php';
require '../controllers/careersController.php';
require '../controllers/carsController.php';
require '../controllers/enquiresController.php';
require '../controllers/manufacturersController.php';
require '../controllers/newsController.php';



$news = new DatabaseTable($pdo, 'news', 'id');
$manufacturers = new DatabaseTable($pdo, 'manufacturers', 'id');
$enquires = new DatabaseTable($pdo, 'enquires', 'id');
$cars = new DatabaseTable($pdo, 'cars', 'id');
$careers = new DatabaseTable($pdo, 'careers', 'id');
$admins = new DatabaseTable($pdo, 'admins', 'admin_id');

$controllers = []; 
$controllers['news'] = new newsController($news);
$controllers['manufacturers'] =  new manufacturersController($manufacturers);
$controllers['enquires'] = new enquiresController($enquires);
$controllers['cars'] = new carsController($cars,$manufacturers);
$controllers['careers'] = new careersController($careers);
$controllers['admins'] = new adminsController($admins);


$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
if ($route == '') {
    $page = $controllers['news']->home();
}
else {
    list($controllerName, $functionName) = explode('/', $route);
    $controller = $controllers[$controllerName];
    $page = $controller->$functionName();
}

$output = loadTemplate('../templates/' . $page['template'], $page['variables']);
$title = $page['title'];
require '../templates/layout.html.php';
?>
