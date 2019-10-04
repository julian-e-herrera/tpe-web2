<?php

class CervezaView{

    function displayAll($cervezas){

        $html = "<ul>";
        foreach($cervezas as $cerveza){
            $html .= "<li>{$cerveza->nombre} </li>";
        }
        $html .= "</ul>";
    
        echo $html;
    }

    function displayCerveza($cerveza){
        var_dump($cerveza);
    }
}