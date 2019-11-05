<?php
require_once("libs/Smarty.class.php");
//require_once("./route-api.php");

class CervezaView{
    private $smarty;
        
    function __construct(){
       // $authHelper = new AuthHelper();
       // $userName = $authHelper->getLoggedUserName();
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
       //$this->smarty->assign('userName', $userName);
    }

    public function DisplayCervezas($cervezas){
       $this->smarty->assign('titulo', 'cervezas');
       $this->smarty->assign('cervezas',$cervezas);
       $this->smarty->display('templates/ver_cervezas.tpl');
    }
    public function DisplayFamiliaCerveza($familia){
        $this->smarty->assign('titulo', 'familia');
        $this->smarty->assign('familia',$familia);
        $this->smarty->display('templates/ver_familia_cervezas.tpl');
     }
    
    public function DisplayCerveza($cerveza) {
        $this->smarty->assign('titulo', 'cerveza');
        $this->smarty->assign('cerveza', $cerveza);
        $this->smarty->display('templates/cervezaDetail.tpl');
    }
    public function showError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }

}