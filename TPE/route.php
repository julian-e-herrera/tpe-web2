<?php

require_once("controllers/CervezasController.php");
require_once("controllers/UserController.php");
require_once("controllers/loginController.php");
require_once('Router.php');

//////////////////CONSTANTES

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');//COMENTADO PORQ TIRA ERROR
define("LOGIN", BASE_URL . 'login');
define("VER", BASE_URL . 'ver');

$r = new Router();

// rutas
$r->addRoute("login", "GET", "UserController", "Login");
$r->addRoute("verify", "POST", "LoginController", "verifyUser");
$r->addRoute("logout", "GET", "LoginController", "logout");
$r->addRoute("ver", "GET", "CervezasController", "showCervezas");/////
$r->addRoute("cervezas/:ID", "GET", "CervezasController", "showCerveza");//////
$r->addRoute("familia/:ID", "GET", "CervezasController", "showFamiliaCerveza");//////
$r->addRoute("insertar", "POST", "CervezasController", "InsertarCerveza");
$r->addRoute("borrar/:ID", "GET", "CervezasController", "BorrarCerveza");

//Ruta por defecto.
$r->setDefaultRoute("CervezasController", "showCervezas");
//$r->setDefaultRoute("loginController", "showLogin");

//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
    
?>


