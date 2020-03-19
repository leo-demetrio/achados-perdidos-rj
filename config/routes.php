<?php


use Projeto\APRJ\Controller\CadastroPrincipal;
use Projeto\APRJ\Controller\CadastroVeiculo;
use Projeto\APRJ\Controller\CadastroDocumento;
use Projeto\APRJ\Controller\CadastroLogin;
use Projeto\APRJ\Controller\CadastroRegistro;
use Projeto\APRJ\Controller\PersisteLogin;
use Projeto\APRJ\Controller\PersistePrincipal;
use Projeto\APRJ\Controller\PersisteRegistro;



return  [
	//'/' =>
	'/login' => CadastroLogin::class,
	'/salvar-login' => PersisteLogin::class,
	'/cadastro-principal' => CadastroPrincipal::class,
	'/salvar-principal' => PersistePrincipal::class,
	'/cadastro-veiculo' => CadastroVeiculo::class,
	'/cadastro-registro' => CadastroRegistro::class,
	'/salvar-registro' => PersisteRegistro::class,
	'/cadastro-documento' => CadastroDocumento::class

];
