<?php

require_once('libs/Smarty.class.php');


class UserView {

    function __construct(){

    }

    public function DisplayLogin(){

        $smarty = new Smarty();
        $smarty->assign('titulo',"Login");
        $smarty->assign('BASE_URL',BASE);
        $smarty->display('templates/login.tpl');
    }
}

?>