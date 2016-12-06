<?php
$array = array(
    '0' => 'pagina_nao_encontrada',
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
    $_POST['usuarios'] = SelectAll();
    View('App/admin/views/usuarios/'.$_GET['action'].'.phtml');

}


function filtro(){

    $nome = addslashes($_GET['nome']);
    $email = addslashes($_GET['email']);
    $login = addslashes($_GET['login']);


    $_GET['mensagem'] = getID();
    $_POST['usuarios'] = SelectAllFiltro($nome, $email, $login);
    View('App/admin/views/usuarios/msg.phtml');

}


function cadastrar(){

    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        #echo '<br>admin.usuarios.salvar';
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $login = addslashes($_POST['login']);
        $senha = addslashes($_POST['senha']);



        if ( empty( $nome ) || empty( $email ) || empty( $login ) || empty( $senha )   ) {

            $_SESSION['msgText'] = '<li>Algum campo est&aacute; em branco.</li>';
            header('location: /admin/usuarios/index/100');//Mensagem Personalizada

        }else{

            $count = CadastrarUsuario($nome, $email, $login, $senha);
            if($count >0){
                header('location: /admin/usuarios/index/2');//Success
            }else{
                header('location: /admin/usuarios/index/1');//Error
            }
        }


    }else{

        View('App/admin/views/usuarios/'.$_GET['action'].'.phtml');
    }
}


function atualizar(){

    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        #echo '<br>admin.usuarios.salvar';
        $id = (int)$_POST['id'];
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $login = addslashes($_POST['login']);
        $senha = addslashes($_POST['senha']);



        if ( empty( $nome ) || empty( $email ) || empty( $login ) || empty( $id )   ) {

            $_SESSION['msgText'] = '<li>Algum campo est&aacute; em branco.</li>';
            header('location: /admin/usuarios/index/100');//Mensagem Personalizada

        }else{
            $count = AtualizarUsuario($nome, $email, $login, $senha, $id);
            if($count >0){
                header('location: /admin/usuarios/index/2');//Success
            }else{
                header('location: /admin/usuarios/index/1');//Error
            }
        }


    }else{

        $_POST['usuario'] = SelectByField('id', getID());
        View('App/admin/views/usuarios/'.$_GET['action'].'.phtml');
    }
}


function excluir(){

    //if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        $count = ExcluirUsuario(getID());
        if($count >0){
            header('location: /admin/usuarios/index/2');//Success
        }else{
            header('location: /admin/usuarios/index/1');//Error
        }

    //}

}


function detalhes(){

    $_POST['usuario'] = SelectByField('id', getID());
    View('App/admin/views/usuarios/'.$_GET['action'].'.phtml');

}