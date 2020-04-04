<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceFilter;
use Projeto\APRJ\Model\ModelPrincipal;
use Projeto\APRJ\Services\ServiceErro;

class PersistePrincipal
{
	public function processaRequisicao(): void
	{
		try{
			
			$nome = ServiceFilter::filtraString($_POST['nome']);
			$telefone = ServiceFilter::filtraString($_POST['telefone']);
			$telefoneRecado = ServiceFilter::filtraString($_POST['telefone-recado']);

			$id = $_SESSION['id'];
			$email = $_SESSION['email'];

			$cadastroPrincipal = new ModelPrincipal();
			$cadastroPrincipal->inserir($id, $nome, $telefone, $telefoneRecado, $email);

		}catch(\Exception $e){
			
			ServiceErro::trataErro($e);

		}
		header('Location: /home-logado');
		die();

	}

}