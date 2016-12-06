<?php
$array = array(
    '0' => 'pagina_nao_encontrada',
    '1' => 'index'
);
require_once('App/System/site_settings.php');



function index(){
    $_POST['produtos'] = SelectAll();
    View('App/views/produtos/'.$_GET['action'].'.phtml');
}
