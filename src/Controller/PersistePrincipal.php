<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Model\ModelPrincipal;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitValidaInputNome;
use Projeto\APRJ\Services\ServiceTraitValidaInputTelefone;

class PersistePrincipal
{
	use ServiceTraitErro;
	use ServiceTraitValidaInputNome;
	use ServiceTraitValidaInputTelefone;
	use ServiceTraitFilter;
	
	public function processaRequisicao(): void
	{
		try{
		
			$nome = $this->filtraString($_POST['nome_completo']);
			// $resultado = $this->validaInputNome($nome);
			// var_dump($resultado);
			// if(!$resultado) throw new \Exception('Nome incompleto');
			// echo "passou";
			// exit;

			$telefone = $this->filtraString($_POST['telefone']);
			// $resultado = $this->validaInputTelefone($telefone);
			// if(!$resultado){
			// 	throw new \Exception("Telefone  errado");
			// }

			$telefoneRecado = $this->filtraString($_POST['telefone-recado']);
			// $resultado = $this->validaInputTelefone($telefoneRecado);
			// if(!$resultado){
			// 	throw new \Exception("Telefone recado errado");
			// }

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