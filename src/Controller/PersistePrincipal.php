<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceFilter;
use Projeto\APRJ\Model\ModelPrincipal;
use Projeto\APRJ\Services\ServiceErro;
use Projeto\APRJ\Services\ServiceValidaInput;

class PersistePrincipal
{
	public function processaRequisicao(): void
	{
		try{
			
			// $nome = ServiceFilter::filtraString($_POST['nome']);
			// $telefone = ServiceFilter::filtraString($_POST['telefone']);
			// $telefoneRecado = ServiceFilter::filtraString($_POST['telefone-recado']);

			$telefone = '(21) 98696-5590';
			$resultado = ServiceValidaInput::validaInputTelefone($telefone);
			if(!$resultado){
				throw new \Exception("Telefone errado");
			}
			var_dump($resultado);exit;

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