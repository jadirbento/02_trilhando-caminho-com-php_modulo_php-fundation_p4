<?php
$_POST = array();
$id;
$action = $_GET['action'];

if(array_key_exists('id',$_GET)){ $id = $_GET['id']; }

//echo '<br>action: '.$action;
//echo '<br>id: '.$id;


#TRATANDO NOME DA ACTION
$action = str_replace('-','_',$action);

#VALIDA - CHAMA UMA ACTION DINÁMICA
GetActionValid($action, $array);
