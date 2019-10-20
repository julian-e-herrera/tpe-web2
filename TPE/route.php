<?php

require_once('controllers/CervezasController.php');
require_once ("controllers/UserController.php");

$cervezasController = new CervezasController();
$cervezasController->showCervezas();
//////////////////

$action = $_GET["action"];
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
define("URL_CERVEZAS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/cervezas');
define("URL_LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
define("URL_LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');


if($action == ''){
    $controller->GetCervezas();
}else{
    if (isset($action)){
        $partesURL = explode("/", $action);

        if($partesURL[0] == "cervezas"){
            $controller->GetCervezas();
        }elseif($partesURL[0] == "insertar") {
            $controller->InsertarCerveza();
        }elseif($partesURL[0] == "borrar") {
            $controller->BorrarCerveza($partesURL[1]);
        }elseif($partesURL[0] == "login") {
            $controllerUser = new UserController();
            $controllerUser->Login();
        }elseif($partesURL[0] == "iniciarSesion") {
            $controllerUser = new UserController();
            $controllerUser->IniciarSesion();
        }elseif($partesURL[0] == "logout") {
            $controllerUser = new UserController();
            $controllerUser->Logout();
        }
    }
}
?>




