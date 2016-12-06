<?php
$array = array(
    '0' => 'pagina_nao_encontrada',
    '1' => 'index'
);
require_once('App/System/site_settings.php');

function index(){
    $_POST['home'] = SelectAll();
    View('App/views/home/'.$_GET['action'].'.phtml');
}