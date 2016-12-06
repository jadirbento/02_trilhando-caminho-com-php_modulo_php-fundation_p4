<?php
$array = array(
    '0' => 'pagina_nao_encontrada',
    '1' => 'index'
);
require_once('App/System/admin_settings.php');





function index(){
    #echo '<br>admin.usuarios.index';
    $_POST['usuarios'] = UsuariosSelectAll();
    $_POST['paginas'] = PaginasSelectAll();
    View('App/admin/views/home/'.$_GET['action'].'.phtml');
}