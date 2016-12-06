<?php
$id = '';
$action = $_GET['action'];
if(array_key_exists('id',$_GET)){ $id = (int)$_GET['id']; }
$GLOBALS['id'] = $id;



function getID(){
    ($GLOBALS['id']) ? $id = $GLOBALS['id'] : $id = 0;

    return $id;
}


//echo '<br>action: '.$action;
//echo '<br>id: '.$id;



#TRATANDO NOME DA ACTION
$action = str_replace('-','_',$action);

#VALIDA - CHAMA UMA ACTION DINÁMICA
GetActionValid($action, $array);



#VERIFICA SESSION
$user = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
if($user ==0){
    header('location: /app/login/');
}