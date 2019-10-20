<?php
require_once("libs/Smarty.class.php");
require_once("./route-api.php");

class CervezaView{

        
    function __construct(){

    }

    public function DisplayCervezas($cerveza){

        $smarty = new Smarty();
       // $smarty->assign('titulo',"Mostrar Cervezas");
        $smarty->assign('BASE_URL',BASE_URL);
        $smarty->assign('lista_cervezas',$cerveza);
        $smarty->display('templates/ver_cervezas.tpl');
    }
}