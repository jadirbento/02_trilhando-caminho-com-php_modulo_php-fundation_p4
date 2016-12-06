<?php
$array = array(
    '0' => 'pagina_nao_encontrada',
    '1' => 'index'
);
require_once('App/System/site_settings.php');




function index(){
    echo '<br>message.index';
    #$_POST['message'] = SelectAll();
}

function pagina_nao_encontrada(){
    View('App/views/message/pagina_nao_encontrada.phtml');
}