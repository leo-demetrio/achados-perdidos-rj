<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Model\ModelPrincipal;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitValidaInput;

class PersistePrincipal
{
	use ServiceTraitErro;
	use ServiceTraitValidaInput;
	use ServiceTraitFilter;
	
	public function processaRequisicao(): void
	{
		try{
			// $cpf = ServiceValidaInput::validaInputCpf('08860751730');
			// echo $cpf;exit;
		
			$nome = $this->filtraString($_POST['nome']);
			$telefone = $this->filtraString($_POST['telefone']);
			$telefoneRecado = $this->filtraString($_POST['telefone-recado']);
			// echo $telefone;exit;
			$resultado = $this->validaInputTelefone($telefone);
			if(!$resultado){
				throw new \Exception("Telefone celular errado");
			}
			$resultado = $this->validaInputTelefone($telefoneRecado);
			if(!$resultado){
				throw new \Exception("Telefone recado errado");
			}

			$id = $_SESSION['id'];
			$email = $_SESSION['email'];

			$cadastroPrincipal = new ModelPrincipal();
			$cadastroPrincipal->inserir($id, $nome, $telefone, $telefoneRecado, $email);

		}catch(\Exception $e){

			$this->trataErro($e);

		}
		header('Location: /home-logado');
		die();

	}

}