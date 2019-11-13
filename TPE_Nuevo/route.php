<?php
    require_once("controllers/CervezasController.php");
    require_once("controllers/FamiliasController.php");
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
    //rutas birra
    $r->addRoute("ver", "GET", "CervezasController", "showCervezas");
    $r->addRoute("cerveza/:ID", "GET", "CervezasController", "showCerveza");
    $r->addRoute("insertar", "POST", "CervezasController", "insertarCerveza");
    $r->addRoute("actualizar/:ID", "POST", "CervezasController", "ActualizarCerveza");
    $r->addRoute("borrar/:ID", "GET", "CervezasController", "borrarCerveza");
     //rutas familias
     $r->addRoute("familias", "GET", "FamiliaController", "showFamilias");
    $r->addRoute("familia/:ID", "GET", "FamiliaController", "showFamilia");
    $r->addRoute("insertar/familia", "POST", "FamiliaController", "insertarFamilia");
    $r->addRoute("actualizar/familia:ID", "POST", "FamiliaController", "ActualizarFamilia");
    $r->addRoute("borrar/familia/:ID", "GET", "FamiliaController", "borrarFamilia");
    //Ruta por defecto.
    $r->setDefaultRoute("CervezasController", "showCervezasDefault");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
?>