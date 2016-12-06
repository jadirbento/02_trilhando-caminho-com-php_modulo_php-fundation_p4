<?php

function SelectById($id){
    $sql = "select id, nome, email from usuarios WHERE id = ".$id;
    $result = DbOpenConnection()->query( $sql );
    return $result->fetch(PDO::FETCH_ASSOC);
}

function SelectAll(){
    $sql = " SELECT * FROM usuarios ORDER BY nome ASC LIMIT 10 ";
    $result = DbOpenConnection()->query( $sql );
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function SelectAllFiltro($nome, $email, $login){

    $sql = " SELECT * FROM usuarios WHERE 1 = 1 ";
    if(!empty($nome)){
        $sql .= " AND nome LIKE '%".$nome."%' ";
    }
    if(!empty($email)){
        $sql .= " AND email LIKE '%".$email."%' ";
    }
    if(!empty($login)){
        $sql .= " AND login LIKE '%".$login."%' ";
    }
    $sql .= "  ORDER BY nome ASC LIMIT 10 ";




    $result = DbOpenConnection()->query( $sql );
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function SelectByField($fieldName, $Value){

    $sql = " SELECT * FROM usuarios WHERE ".$fieldName." = '".$Value."'";
    $result = DbOpenConnection()->query( $sql );

    return $result->fetch(PDO::FETCH_ASSOC);
}

function SelectValidaUsuario($login, $senha){
    $sql = "select func_valida_usuario('".$login."','".$senha."') as Validou";
    echo '<br>' . $sql;
    $result = DbOpenConnection()->query( $sql );
    return $result->fetch(PDO::FETCH_ASSOC);
}






function CadastrarUsuario($nome, $email, $login, $senha){
    try
    {
        $sql = "INSERT INTO usuarios  (id, nome, email, login, senha)  VALUES (NULL, '".$nome."', '".$email."', '".$login."', MD5('".$senha."'))";
        $count = DbOpenConnection()->exec( $sql );

        return $count;
    }
    catch ( Exception  $e )
    {
        return 0;
    }

}

function AtualizarUsuario($nome, $email, $login, $senha, $id){
    try
    {
        $sql='';
        if($senha !=''){
            $sql = "UPDATE usuarios SET nome = '".$nome."', email = '".$email."', login = '".$login."', senha = MD5('".$senha."') WHERE id = ".$id;
        }else{
            $sql = "UPDATE usuarios SET nome = '".$nome."', email = '".$email."', login = '".$login."' WHERE id = ".$id;
        }

        $count = DbOpenConnection()->exec( $sql );

        return $count;
    }
    catch ( Exception  $e )
    {
        return 0;
    }

}

function ExcluirUsuario($id){
    try
    {
        $sql = "DELETE FROM usuarios WHERE id = ". $id;
        #echo $sql;
        $count = DbOpenConnection()->exec( $sql );

        return $count;
    }
    catch ( Exception  $e )
    {
        return 0;
    }

}