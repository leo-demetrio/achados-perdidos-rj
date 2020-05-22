<?php

namespace Projeto\APRJ\Controller;


use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelLogin;
use Projeto\APRJ\Model\ModelRegistro;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitErro;

class PersisteLogin implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;

	public function processaRequisicao(): void
	{
		try{
			//colocar limpa post
			$_SESSION['email'] = $_POST['email'];
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

			if(is_null($senhaFiltrada) || $senhaFiltrada === false){
				
				header('location: /login');
				exit;
			}

			if(password_verify($senhaFiltrada, $email->getSenha())){
				echo 'Email ou senha inválidos';
				exit;
			}
			//pegar nome e por no cabeçalho
			$registroNome = new ModelRegistro();
			$nome = $registroNome->buscaPeloId($_SESSION['id']);
			$_SESSION['nome'] = $nome['nome'];


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