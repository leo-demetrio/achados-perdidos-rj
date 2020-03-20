<?php

require __DIR__ . '/../vendor/autoload.php';

// var_dump($_SERVER);exit;
use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;

session_start();
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['data'] = date('d/m/y');

//print_r($_SERVER['PATH_INFO']);exit;
$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';

if(!array_key_exists($caminho, $rotas))
{
	echo "Erro 404";
	return;
}

$classeControladora = $rotas[$caminho];
$controlador = new $classeControladora();
$controlador->processaRequisicao();

