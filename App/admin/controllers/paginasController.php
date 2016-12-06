<?php
$array = array(
    '1' => 'index',
    '2' => 'cadastrar',
    '3' => 'atualizar',
    '4' => 'excluir',
    '5' => 'detalhes',
    '6' => 'filtro'
);
require_once('App/System/admin_settings.php');






function index(){

    $_GET['mensagem'] = getID();
    $_POST['paginas'] = SelectAll();
    View('App/admin/views/paginas/'.$_GET['action'].'.phtml');

}


function filtro(){

    $titulo = addslashes($_GET['titulo']);
    $slug = addslashes($_GET['slug']);
    $texto = addslashes($_GET['texto']);


    $_GET['mensagem'] = getID();
    $_POST['paginas'] = SelectAllFiltro($titulo, $slug, $texto);
    View('App/admin/views/paginas/msg.phtml');

}


function cadastrar(){

    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        $titulo = addslashes($_POST['titulo']);
        $slug = addslashes($_POST['slug']);
        $texto = addslashes($_POST['texto']);



        if ( empty( $titulo ) || empty( $slug ) || empty( $texto )  ) {

            $_SESSION['msgText'] = '<li>Algum campo est&aacute; em branco.</li>';
            header('location: /admin/paginas/index/100');//Mensagem Personalizada

        }else{

            $count = CadastrarPagina($titulo, $slug, $texto);
            if($count >0){
                header('location: /admin/paginas/index/2');//Success
            }else{
                header('location: /admin/paginas/index/1');//Error
            }
        }


    }else{

        View('App/admin/views/paginas/'.$_GET['action'].'.phtml');
    }
}


function atualizar(){

    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        #echo '<br>admin.paginas.salvar';
        $id = (int)$_POST['id'];
        $titulo = addslashes($_POST['titulo']);
        $slug = addslashes($_POST['slug']);
        $texto = addslashes($_POST['texto']);



        if ( empty( $titulo ) || empty( $slug ) || empty( $texto ) || empty( $id )   ) {

            $_SESSION['msgText'] = '<li>Algum campo est&aacute; em branco.</li>';
            header('location: /admin/paginas/index/100');//Mensagem Personalizada

        }else{
            $count = AtualizarPagina($titulo, $slug, $texto, $id);
            if($count >0){
                header('location: /admin/paginas/index/2');//Success
            }else{
                header('location: /admin/paginas/index/1');//Error
            }
        }


    }else{

        $_POST['pagina'] = SelectByField('id', getID());
        View('App/admin/views/paginas/'.$_GET['action'].'.phtml');
    }
}


function excluir(){

    //if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        $count = ExcluirPagina(getID());
        if($count >0){
            header('location: /admin/paginas/index/2');//Success
        }else{
            header('location: /admin/paginas/index/1');//Error
        }

    //}

}


function detalhes(){

    $_POST['pagina'] = SelectByField('id', getID());
    View('App/admin/views/paginas/'.$_GET['action'].'.phtml');

}