<?php

namespace Projeto\APRJ\Controller;


use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelLogin;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitErro;

class PersisteLogin implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;

	public function processaRequisicao(): void
	{
		try{

			$email = $_POST['email'];
			$senha = $_POST['senha'];

			$emailFiltrado = $this->filtraEmail($email);
			$senhaFiltrada = $this->filtraString($senha);

			if(is_null($emailFiltrado) || $emailFiltrado === false){
				// echo $emailFiltrado.'leo';
				// echo 'ok';exit;
				header('location: /login');
				exit;
			}

			$email = new ModelLogin();
			$email->buscaPeloEmail($emailFiltrado);

			$_SESSION['id'] = $email->getId_registro();
			//$_SESSION['id'].'id';exit;

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

			$this->trataErro($e);

		}

		//$email = ServiceFilter::filtraEmail($email);

		//echo $email;exit;
		//$login = new ModelLogin();
		//$login->inserir($senha);
	}
}