<?php
$array = array(
    '0' => 'pagina_nao_encontrada',
    '1' => 'index'
);
require_once('App/System/site_settings.php');



function index(){
    #$_POST['empresa'] = SelectAll();
    View('App/views/contato/'.$_GET['action'].'.phtml');
}
