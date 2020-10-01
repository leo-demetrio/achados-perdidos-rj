<?php

namespace Projeto\APRJ\Controller;


use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelLogin;
use Projeto\APRJ\Model\ModelRegistro;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitFlashMessage;
use Projeto\APRJ\Services\ServiceTraitLimpaPost; 

class PersisteLogin implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;
	use ServiceTraitLimpaPost;
	use ServiceTraitFlashMessage;

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
				header('location: /login');
				return;
			}

			$email = new ModelLogin();
			$email->buscaPeloEmail($emailFiltrado);

			$_SESSION['id'] = $email->getId_registro();
			//echo $_SESSION['id'].'id';exit;

			if(!$email->getEmail() || !$email->getSenha()){
				$this->messageDanger('dl1');
				header('location: /login');
				return;
			}

			if(is_null($senhaFiltrada) || $senhaFiltrada === false){
				$this->messageDanger('dl1');
				header('location: /login');
				return;
			}
			
			// //tamanho da senha colocar no registro
			// if(strlen($senhaFiltrada) >= 3 && strlen($senhaFiltrada) < 70){
			// 	$this->messageDanger('dl1');
			// 	header('location: /login');
			// 	return;
			//  }

			if(!password_verify($senhaFiltrada, $email->getSenha())){
				$this->messageDanger('dl1');
				header('location: /login');
				return;
			}
			
			//pegar nome e por no cabeçalho
			$registro = new ModelRegistro();
			$registro = $registro->buscaPeloId($_SESSION['id']);
			$_SESSION['nome'] = $registro['nome'];


			header('Location: /home-logado');
			return;

		}catch(\Exception $e){
			$this->trataErro($e);
		}
	}
}