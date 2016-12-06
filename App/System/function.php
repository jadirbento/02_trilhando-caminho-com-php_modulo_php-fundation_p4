<?php
/**
 * Created by PhpStorm.
 * User: Jadir Bento
 * Date: 30/11/2016
 * Time: 00:01
 */

function getActionValid($ac, array $arrAction){

    if (in_array($ac, $arrAction, true)) {
        #print_r($arrAction);
        #echo "<br>A action ".$ac." encontrada";

        return $ac();
    } else {
        #echo "<br>A action ".$ac." nao existe";

        #return pagina_nao_encontrada();
        return require_once('App/views/message/pagina_nao_encontrada.phtml');
    };
}


function getTipo($uri){
    $tipo = explode('/', $uri);
    #print_r($tipo);

    return $tipo[1];
}

function View($fileName){
//    echo '<br>$fileName:'.$fileName. '<br>';
//    echo '<br>file_exists:'.file_exists($fileName). '<br>';

    if(file_exists($fileName)){
        return require_once($fileName);
    }else{
        return require_once('App/views/message/pagina_nao_encontrada.phtml');
    }
}