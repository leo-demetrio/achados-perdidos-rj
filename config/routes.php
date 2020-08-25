<?php


use Projeto\APRJ\Controller\CadastroPrincipal;
use Projeto\APRJ\Controller\CadastroVeiculo;
use Projeto\APRJ\Controller\CadastroDocumento;
use Projeto\APRJ\Controller\CadastroLogin;
use Projeto\APRJ\Controller\CadastroRegistro;
use Projeto\APRJ\Controller\PersisteLogin;
use Projeto\APRJ\Controller\PersistePrincipal;
use Projeto\APRJ\Controller\PersisteRegistro;
use Projeto\APRJ\Controller\PersisteVeiculo;
use Projeto\APRJ\Controller\PersisteDocumento;
use Projeto\APRJ\Controller\HomeLogado;
use Projeto\APRJ\Controller\Relatorio;
//use Projeto\APRJ\Controller\RelatorioAchado;
use Projeto\APRJ\Controller\Sair;
use Projeto\APRJ\Controller\ExcluirDocumento;
use Projeto\APRJ\Controller\ExcluirDocumentoAchado;
use Projeto\APRJ\Controller\ExcluirVeiculo;
//use Projeto\APRJ\Controller\ExcluirVeiculoAchado;
use Projeto\APRJ\Controller\Teste;
use Projeto\APRJ\Controller\Documento;
use Projeto\APRJ\Controller\Veiculo;
use Projeto\APRJ\Controller\PersisteSuspeito;
use Projeto\APRJ\Controller\EditaDocumento;



return  [
	'/' => HomeLogado::class,
	'/teste' => Teste::class,
	'/home' => HomeLogado::class,
	'/login' => CadastroLogin::class,
    '/documento' => Documento::class,
    '/veiculo' => Veiculo::class,
    '/salvar-suspeito' => PersisteSuspeito::class,
	'/salvar-login' => PersisteLogin::class,
	'/registro' => CadastroRegistro::class,
	'/salvar-registro' => PersisteRegistro::class,
	'/cadastro-principal' => CadastroPrincipal::class,
	'/salvar-principal' => PersistePrincipal::class,
	'/home-logado' => HomeLogado::class,
	'/cadastro-veiculo' => CadastroVeiculo::class,
	'/salvar-veiculo' => PersisteVeiculo::class,
	'/cadastro-documento' => CadastroDocumento::class,
	'/salvar-documento' => PersisteDocumento::class,
	'/relatorio' => Relatorio::class,
	'/relatorio-encontrado' => RelatorioAchado::class,
	'/sair' => Sair::class,
	'/excluir-documento' => ExcluirDocumento::class,
	'/excluir-documentos-achados' => ExcluirDocumentoAchado::class,
	'/excluir-veiculo' => ExcluirVeiculo::class,
	'/excluir-veiculos-achados' => ExcluirVeiculoAchado::class,
    '/editar/documento' => EditaDocumento::class

];
