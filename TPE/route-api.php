<?php

require_once("Router.php");
require_once("./api/CervezasApiController.php");
// require_once("./api/ApiController.php");
// require_once("./api/JSONView.php");



define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');


// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("cervezas", "GET", "CervezasApiController", "getCervezas");//
$router->addRoute("familia/:ID", "GET", "CervezasApiController", "getFamiliaCerveza");//
$router->addRoute("cervezas/:ID", "GET", "CervezasApiController", "getCerveza");//
$router->addRoute("cervezas/:ID", "DELETE", "CervezasApiController", "deleteCerveza");//
$router->addRoute("cervezas", "POST", "CervezasApiController", "addCerveza");//
$router->addRoute("cervezas/:ID", "PUT", "CervezasApiController", "updateCerveza");//

// rutea
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);//este marca error

