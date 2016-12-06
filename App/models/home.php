<?php
#echo "<br>model.home<br>";

function SelectById($id){

}

function SelectAll(){
    $sql = "select * from `paginas` where slug = 'home' limit 1";
    $result = DbOpenConnection()->query( $sql );
    return $result->fetch(PDO::FETCH_ASSOC);
}

function SelectByField($fieldName, $Value){

}





