<?php
function UsuariosSelectAll(){
    $sql = " SELECT * FROM usuarios ORDER BY id DESC LIMIT 5 ";
    $result = DbOpenConnection()->query( $sql );
    return $result->fetchAll(PDO::FETCH_ASSOC);
}


function PaginasSelectAll(){
    $sql = " SELECT * FROM paginas ORDER BY id DESC LIMIT 5 ";
    $result = DbOpenConnection()->query( $sql );
    return $result->fetchAll(PDO::FETCH_ASSOC);
}