<?php
$_GET = array();


/**
 * @param $area
 * verifica se o primeiro parámetro é um diretório físico;
 * caso não seja, deverá ser o nome de um controller;
 * caso nenhum acima, retorna pagina não encontrada.
 */
function is_system_area($area){

    if(is_dir('App/'.$area)) {

        //echo "<br>A area ".$area." encontrada";
        return $area;

    } else {

        //echo "<br>A area ".$area." nao existe";
        return '';

    };
}




/**
 * @param $path
 */
function AnalisaRota($path){
    $separador = explode('/',$path);
//    print_r($separador);





    $Cont = count($separador);
    $area = '';
    $controller = '';
    $action = '';

    #esta se array sempre tem o minimo ( 2 parámetros)
    if(array_key_exists('1',$separador)){ $area = $separador[1]; }




    if(is_system_area($area)) {#AREA/CONTROLLER/ACTION/ID

        #somente área [/admin]
        if(array_key_exists('2',$separador)){ $controller = $separador[2]; }
        if(count($separador) <= 2 && $controller == ''){
            $separador[0] = $area;//area
            $separador[1] = 'home';//controller
            $separador[2] = 'index';//action
        }

        #controller vazio [/admin/]
        if(count($separador) == 3 && $controller == ''){
            $separador[0] = $area;//area
            $separador[1] = 'home';//controller
            $separador[2] = 'index';//action
        }

        #controle informado [/admin/usuarios]
        if(count($separador) == 3 && $controller != ''){
            $separador[0] = $area;//area
            $separador[1] = $separador[2];//controller
            $separador[2] = 'index';//action
        }

        #controle informado, action vazia [/admin/usuarios/]
        if(array_key_exists('3',$separador)){ $action = $separador[3]; }
        if(count($separador) == 4 && $action == ''){
            $separador[0] = $area;//area
            $separador[1] = $separador[2];//controller
            $separador[2] = 'index';//action
        }

        #controle informado, action vazia [/admin/usuarios/cadastrar/99]
        if(count($separador) <= 5 && $action != ''){
            $separador[0] = $area;//area
            $separador[1] = $separador[2];//controller
            $separador[2] = $action;//action
            //id
            if(array_key_exists('4',$separador)){ $separador[3] = $separador[4]; }
        }


    }else{#CONTROLLER/ACTION/ID


        if(array_key_exists('2',$separador)){ $action = $separador[2]; }
        if(count($separador) <= 2 && $separador[1] == '' && $action == ''){
            $separador[0] = '-';//area
            $separador[1] = 'home';//controller
            $separador[2] = 'index';//action
        }


        if(count($separador) <= 3 && $action == ''){
            $separador[0] = '-';//area
            $separador[1] = $separador[1];//controller
            $separador[2] = 'index';//action
        }else{
            $separador[0] = '-';//area
            $separador[1] = $separador[1];//controller
            $separador[2] = $separador[2];//action
            //id
            if(array_key_exists('3',$separador)){ $separador[3] = $separador[3]; }
        }

    }



    ###Set Up - Elementos da Query String;
    ###Exemplo: /admin/usuarios/filtro/?nome=&email=teste&login=;

    $QueryString = explode('?', $_SERVER['REQUEST_URI']);
    if(array_key_exists('1',$QueryString)){
        $parametros = explode('&', $QueryString[1]);
        foreach ($parametros as $element) {
            $parametro = explode('=', $element);
            $_GET[$parametro[0]] = $parametro[1];//Parametros da Query String
        }
    }
    #print_r($_GET);


    return $separador;
}





/**
 * @param $path
 */
function Rotas($path){

    $separador = AnalisaRota($path);
//    print_r($separador);


    $area = $separador[0];//area
    $controller = $separador[1];//controller
    $action = $separador[2];//action
    $id = '';//id
    if(array_key_exists('3',$separador)){ $id = $separador[3]; }

//    echo '<br>'.$area;
//    echo '<br>'.$controller;
//    echo '<br>'.$action;
//    echo '<br>'.$id;



    #VERIFICA SE ROTA TEM UMA ÁREA
    if(is_system_area($area)){

//        echo file_exists('App/'.$area.'/controllers/'.$controller.'Controller.php').'<br>';
//        echo 'App/'.$area.'/controllers/'.$controller.'Controller.php'.'<br>';

        if(file_exists('App/'.$area.'/controllers/'.$controller.'Controller.php')){
            $_GET['action'] = $action;
            if($id){$_GET['id'] = $id;}

            #MODEL
            if(file_exists('App/' . $area . '/models/' . $controller . '.php')) {
                require_once('App/' . $area . '/models/' . $controller . '.php');
            }

            #CONTROLLER
            return require_once('App/'.$area.'/controllers/'.$controller.'Controller.php');
        }else{
            $_GET['action'] = 'pagina-nao-encontrada';
            return require_once('App/controllers/messageController.php');
        }

    }else{

        if(file_exists('App/controllers/'.$controller.'Controller.php')){
            $_GET['action'] = $action;
            if(!empty($id)){$_GET['id'] = $id;}

            #MODEL
            #echo '<br>'.'App/models/' . $controller . '.php';
            if(file_exists('App/models/' . $controller . '.php')) {
                require_once('App/models/' . $controller . '.php');
            }

            #CONTROLLER
            return require_once('App/controllers/'.$controller.'Controller.php');
        }else{
            $_GET['action'] = 'pagina-nao-encontrada';
            return require_once('App/controllers/messageController.php');
        }

    }
}
