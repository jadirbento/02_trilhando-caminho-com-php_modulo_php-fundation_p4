<?php
define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'root' );
define( 'MYSQL_PASSWORD', '123456' );
define( 'MYSQL_DB_NAME', 'php_fundation_cms' );
$oConn=null;


function DbOpenConnection() {
    global $oConn;

    if ($oConn == null) {

        try
        {
            $oConn = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD );
            $oConn->exec("set names utf8");
        }
        catch ( PDOException $e )
        {
            echo 'Não foi possivel estabelecer uma conexão com banco. <br> Código do erro: '.$e->getCode() . ' <br> Descrição do erro: '. $e->getMessage();
        }

    }
    return $oConn;
}