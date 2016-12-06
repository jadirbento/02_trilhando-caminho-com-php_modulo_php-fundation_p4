<?php
//Forчar o PHP a mostrar os erros
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);
//desabilitar quando em produчуo


session_start();
require_once('App/System/function.php');
require_once('App/System/rotas.php');
require_once('App/System/database.php');
#include Layout
if(getTipo($_SERVER['REQUEST_URI']) =='admin'){
    require_once('App/admin/views/layout/default.phtml');
}else{
    require_once('App/views/layout/default.phtml');
}






function ContentPlaceHolder() {
    $rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    $rota = str_replace('.','-',$rota);

    Rotas($rota['path']);
}