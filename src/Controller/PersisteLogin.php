<?php

namespace Projeto\APRJ\Controller;


use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelLogin;
use Projeto\APRJ\Services\ServiceFilter;
use Projeto\APRJ\Services\ServiceErro;

class PersisteLogin implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		try{

			$email = $_POST['email'];
			$senha = $_POST['senha'];

			$emailFiltrado = ServiceFilter::filtraEmail($email);
			$senhaFiltrada = ServiceFilter::filtraString($senha);

			if(is_null($emailFiltrado) || $emailFiltrado === false){
				// echo $emailFiltrado.'leo';
				// echo 'ok';exit;
				header('location: /login');
				exit;
			}

			$email = new ModelLogin();
			$email->buscaPeloEmail($emailFiltrado);

			if(!$email->getEmail() || !$email->getSenha()){
				echo "Email ou senha Inválidos";
				exit;
			}
			//echo $emailBanco.'login';exit;
			// echo $senhaFiltrada.'parou';
			// var_dump($senhaFiltrada);exit;
			// $e = is_null($senhaFiltrada);
			// var_dump($e);exit;

			//echo "passou";exit;



			if(is_null($senhaFiltrada) || $senhaFiltrada === false){
				// echo $emailFiltrado.'leo';
				// echo 'ok';exit;
				header('location: /login');
				exit;
			}

			if(password_verify($senhaFiltrada, $email->getSenha())){
				echo 'Email ou senha inválidos';
				exit;
			}

			header('Location: /home-logado');
			exit;

		}catch(\Exception $e){

			ServiceErro::trataErro($e);

		}

		//$email = ServiceFilter::filtraEmail($email);

		//echo $email;exit;
		//$login = new ModelLogin();
		//$login->inserir($senha);
	}
}