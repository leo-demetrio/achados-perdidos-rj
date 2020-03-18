<?php

require __DIR__ . '/../vendor/autoload.php';

use Projeto\APRJ\Controller\CadastroPrincipal;
use Projeto\APRJ\Controller\CadastroVeiculo;
use Projeto\APRJ\Controller\CadastroDocumento;

switch($_SERVER['PATH_INFO']){

	case '/cadastro-principal':
	$cadastro = new CadastroPrincipal();
	$cadastro->processaRequisicao();
	break;
	case '/cadastro-veiculo':
	$cadastro = new CadastroVeiculo();
	$cadastro->processaRequisicao();
	break;
	case '/cadastro-documento':
	$cadastro = new CadastroDocumento();
	$cadastro->processaRequisicao();
	break;	
}