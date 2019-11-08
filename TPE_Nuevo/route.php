<?php
    require_once("controllers/CervezasController.php");
    require_once("controllers/loginController.php");
    require_once('Router.php');

    //CONSTANTES
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", BASE_URL . 'login');
    define("VER", BASE_URL . 'ver');

    $r = new Router();

    // rutas
    $r->addRoute("login", "GET", "LoginController", "showLogin");
    $r->addRoute("verify", "POST", "LoginController", "verifyUser");
    $r->addRoute("logout", "GET", "LoginController", "logout");
    $r->addRoute("ver", "GET", "CervezasController", "showCervezas");
    $r->addRoute("cerveza/:ID", "GET", "CervezasController", "showCerveza");
    $r->addRoute("insertar", "POST", "CervezasController", "insertarCerveza");
    $r->addRoute("borrar/:ID", "GET", "CervezasController", "borrarCerveza");

    //Ruta por defecto.
    $r->setDefaultRoute("CervezasController", "showCervezas");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
?>