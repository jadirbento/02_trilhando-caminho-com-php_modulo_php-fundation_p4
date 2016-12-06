<?php

function SelectById($id){
    $sql = "select id, titulo, email from paginas WHERE id = ".$id;
    $result = DbOpenConnection()->query( $sql );
    return $result->fetch(PDO::FETCH_ASSOC);
}

function SelectAll(){
    $sql = " SELECT * FROM paginas ORDER BY titulo ASC LIMIT 10 ";
    $result = DbOpenConnection()->query( $sql );
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function SelectAllFiltro($titulo, $slug, $texto){

    $sql = " SELECT * FROM paginas WHERE 1 = 1 ";
    if(!empty($titulo)){
        $sql .= " AND titulo LIKE '%".$titulo."%' ";
    }
    if(!empty($slug)){
        $sql .= " AND slug LIKE '%".$slug."%' ";
    }
    if(!empty($texto)){
        $sql .= " AND texto LIKE '%".$texto."%' ";
    }
    $sql .= "  ORDER BY titulo ASC LIMIT 10 ";




    $result = DbOpenConnection()->query( $sql );
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function SelectByField($fieldName, $Value){

    $sql = " SELECT * FROM paginas WHERE ".$fieldName." = '".$Value."'";
    $result = DbOpenConnection()->query( $sql );

    return $result->fetch(PDO::FETCH_ASSOC);
}

function SelectValidaPagina($texto, $senha){
    $sql = "select func_valida_Pagina('".$texto."','".$senha."') as Validou";
    echo '<br>' . $sql;
    $result = DbOpenConnection()->query( $sql );
    return $result->fetch(PDO::FETCH_ASSOC);
}






function CadastrarPagina($titulo, $slug, $texto){
    try
    {
        $sql = "INSERT INTO paginas  (id, titulo, slug, texto, criado)  VALUES (NULL, '".$titulo."', '".$slug."', '".$texto."', NOW())";
        $count = DbOpenConnection()->exec( $sql );

        return $count;
    }
    catch ( Exception  $e )
    {
        return 0;
    }

}

function AtualizarPagina($titulo, $slug, $texto, $id){
    try
    {
        $sql = "UPDATE paginas SET titulo = '".$titulo."', slug = '".$slug."', texto = '".$texto."', modificado = NOW() WHERE id = ".$id;
        $count = DbOpenConnection()->exec( $sql );

        return $count;
    }
    catch ( Exception  $e )
    {
        return 0;
    }

}

function ExcluirPagina($id){
    try
    {
        $sql = "DELETE FROM paginas WHERE id = ". $id;
        #echo $sql;
        $count = DbOpenConnection()->exec( $sql );

        return $count;
    }
    catch ( Exception  $e )
    {
        return 0;
    }

}