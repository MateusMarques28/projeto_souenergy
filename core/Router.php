<?php

use core\controller\Main;

$router = array();

$router['index'] = [
    'rota' => '/',
    'controller' =>  "Main",
    'action' => "index"
];

$router['Login'] = [
    'rota' => '/Login',
    'controller' => 'Main',
    'action' => 'Login'
];


$router['Cadastro'] = [
    'rota' => '/Cadastro',
    'controller' => 'Main',
    'action' => 'Cadastro'
];


$router['Cadastro_Usuario'] = [
    'rota' => '/Cadastro_Usuario',
    'controller' => 'Main',
    'action' => 'Cadastro_Usuario'
];




$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
foreach ($router as $rota) :
    if ($url === $rota['rota']) :
        $controller = 'core\\controller\\' . ucfirst($rota['controller']);
        $metodo = $rota['action'];

        $ctr = new $controller();
        $ctr->$metodo();
        return;
    endif;
endforeach;

$ctr = new Main();
$ctr->index();
return;
