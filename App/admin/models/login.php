<?php
function SelectById($id){
    $sql = "select id, nome, email from usuarios where id = ".$id;
    $result = DbOpenConnection()->query( $sql );
    return $result->fetch(PDO::FETCH_ASSOC);
}



function SelectValidaUsuario($login, $senha){
    $sql = "select func_valida_usuario('".$login."','".$senha."') as Validou";
    $result = DbOpenConnection()->query( $sql );
    return $result->fetch(PDO::FETCH_ASSOC);
}




