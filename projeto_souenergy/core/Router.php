<?php

use core\controller\Main;
use Firebase\JWT\JWT;

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

$router['verifica_usuario'] = [
    'rota' => '/verifica_usuario',
    'controller' => 'Main',
    'action' => 'verifica_usuario'
];

$router['tabela'] = [
    'rota' => '/tabela',
    'controller' => 'Main',
    'action' => 'tabela'
];

$router['edit'] = [
    'rota' => '/Editar',
    'controller' => 'Main',
    'action' => 'edit'
];


$router['Dados_Atualizados'] = [
    'rota' => '/Dados_Atualizados',
    'controller' => 'Main',
    'action' => 'editar'
];

$router['delete'] = [
    'rota' => '/Delete',
    'controller' => 'Main',
    'action' => 'delet'
];

$router['Dados_Deletados'] = [
    'rota' => '/Dados_Deletados',
    'controller' => 'Main',
    'action' => 'delete'
];


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
foreach ($router as $rota) :
    //echo JWT::encode(['user' => ['mateus']], key(['chavinha_secreta']));
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
