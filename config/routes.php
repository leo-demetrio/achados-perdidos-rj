<?php


use Projeto\APRJ\Controller\CadastroPrincipal;
use Projeto\APRJ\Controller\CadastroVeiculo;
use Projeto\APRJ\Controller\CadastroDocumento;
use Projeto\APRJ\Controller\CadastroLogin;
use Projeto\APRJ\Controller\CadastroRegistro;
use Projeto\APRJ\Controller\PersisteLogin;
use Projeto\APRJ\Controller\PersistePrincipal;
use Projeto\APRJ\Controller\PersisteRegistro;
use Projeto\APRJ\Controller\HomeLogado;



return  [
	//'/' =>
	'/login' => CadastroLogin::class,
	'/salvar-login' => PersisteLogin::class,
	'/cadastro-registro' => CadastroRegistro::class,
	'/salvar-registro' => PersisteRegistro::class,
	'/cadastro-principal' => CadastroPrincipal::class,
	'/salvar-principal' => PersistePrincipal::class,
	'/home-logado' => HomeLogado::class,
	'/cadastro-veiculo' => CadastroVeiculo::class,
	'/cadastro-documento' => CadastroDocumento::class

];
