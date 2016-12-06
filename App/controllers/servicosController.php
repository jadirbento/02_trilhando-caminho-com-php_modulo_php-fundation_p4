<?php
$array = array(
    '0' => 'pagina_nao_encontrada',
    '1' => 'index'
);
require_once('App/System/site_settings.php');



function index(){
    $_POST['servicos'] = SelectAll();
    View('App/views/servicos/'.$_GET['action'].'.phtml');
}
