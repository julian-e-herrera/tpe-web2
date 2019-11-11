<?php
require_once("libs/Smarty.class.php");
//require_once("./route-api.php");

class FamiliaView{
    private $smarty;
    private $familiaModel;
    private $cervezaModel;

        
    function __construct(){
       $authHelper = new AuthHelper();
       $userName = $authHelper->getLoggedUserName();
       $this->familiaModel= new FamiliaModel();///
       //$this->$cervezaModel= new CervezaModel();
        $this->smarty = new Smarty();
        $this->smarty->assign('basehref', BASE_URL);
       $this->smarty->assign('userName', $userName);
    }

    // public function DisplayFamilias($familias){
    //    $this->smarty->assign('titulo', 'familias');
    //    $this->smarty->assign('familias',$familias);
    //    $this->smarty->display('templates/ver_familias.tpl');//////to do
    public function DisplayFamilias($familias,$cervezas){
        $this->smarty->assign('titulo', 'familias');
        $this->smarty->assign('familias',$familias);
        $this->smarty->assign('cervezas',$cervezas);

        $this->smarty->display('templates/ver_familias.tpl');
    }
    public function DisplayFamiliasUser($familias,$cervezas){
        $this->smarty->assign('titulo', 'familias');
        $this->smarty->assign('familias',$familias);
        $this->smarty->assign('cervezas',$cervezas);

        $this->smarty->display('templates/ver_familias.tpl');
    }
    // public function DisplayFamiliaCerveza($familia){
    //     $this->smarty->assign('titulo', 'familia');
    //     $this->smarty->assign('familia',$familia);
    //     $this->smarty->display('templates/ver_familia_cervezas.tpl');
    //  }
    
    public function DisplayFamilia($familia,$cervezas) {
        $this->smarty->assign('titulo', 'familia');
        $this->smarty->assign('familia', $familia);
        $this->smarty->assign('cervezas',$cervezas);

        $this->smarty->display('templates/ver_familia_cervezas.tpl');///to do
    }
    public function showError($msgError) {
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }

}