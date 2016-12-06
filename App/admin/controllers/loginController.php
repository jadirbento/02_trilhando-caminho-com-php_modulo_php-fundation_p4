<?php
$array = array(
    '0' => 'autenticar',
    '1' => 'logout',
    '2' => 'msg'
);
$id;
$action = $_GET['action'];
if(array_key_exists('id',$_GET)){ $id = $_GET['id']; }


#TRATANDO NOME DA ACTION
$action = str_replace('-','_',$action);

#VALIDA - CHAMA UMA ACTION DINÁMICA
GetActionValid($action, $array);




function autenticar(){

    if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = addslashes($username);
        $password = addslashes($password);

        if ( empty( $username ) || empty( $password ) ) {
            die("Algum campo está em branco.");
        }

//        echo '<br>username: '. $username;
//        echo '<br>password: '. $password;
//        echo '<br>';

        $login = SelectValidaUsuario($username, $password);
        if($login['Validou'] >0){#retorna o ID ou ZERO
            $dados_user = SelectById($login['Validou']);

            #echo '<br>';
            #print_r($dados_user);

            $_SESSION['id'] = $dados_user['id'];
            $_SESSION['nome'] = $dados_user['nome'];
            $_SESSION['email'] = $dados_user['email'];

            header('Location: /admin/');
        }else{

            $_SESSION['msgText'] = '<li>Login ou Senha est&atilde;o incorretos.</li>';
            header('location: /admin/login/msg/100');//Mensagem Personalizada

        }

    }else{
        die("ERRO, Acesso Negado!");
    }
}

function logout(){
    unset ($_SESSION['id']);
    unset ($_SESSION['nome']);
    unset ($_SESSION['email']);

    #header('location: /app/login/');
    header('location: /');//home do site
}

function msg(){

    $_GET['mensagem'] = 100;
    View('App/admin/views/login/'.$_GET['action'].'.phtml');
}