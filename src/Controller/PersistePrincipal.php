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
			// $cpf = ServiceValidaInput::validaInputCpf('08860751730');
			// echo $cpf;exit;
		
			$nome = ServiceFilter::filtraString($_POST['nome']);
			$telefone = ServiceFilter::filtraString($_POST['telefone']);
			$telefoneRecado = ServiceFilter::filtraString($_POST['telefone-recado']);
			// echo $telefone;exit;
			$resultado = ServiceValidaInput::validaInputTelefone($telefone);
			if(!$resultado){
				throw new \Exception("Telefone celular errado");
			}
			$resultado = ServiceValidaInput::validaInputTelefone($telefoneRecado);
			if(!$resultado){
				throw new \Exception("Telefone recado errado");
			}

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