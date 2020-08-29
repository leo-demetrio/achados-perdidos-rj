<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
// use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Model\ModelPrincipal;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitValidaInputNome;
use Projeto\APRJ\Services\ServiceTraitValidaInputTelefone;
use Projeto\APRJ\Services\ServiceTraitLimpaPost;
use Projeto\APRJ\Services\ServiceTraitFlashMessage;

class PersistePrincipal
{
	use ServiceTraitErro;
	use ServiceTraitValidaInputNome;
	use ServiceTraitValidaInputTelefone;
	// use ServiceTraitFilter;
	use ServiceTraitLimpaPost;
	use ServiceTraitFlashMessage;


	
	public function processaRequisicao(): void
	{
		try{


			$post = $this->limpaPost($_POST);
			$nome = $post['nome'];
			$telefone = $post['telefone'];
			$telefone_recado = $post['telefone-recado'];
			$id = $_SESSION['id'];
 			$email = $_SESSION['email'];
 			$_SESSION['nome'] = $nome;
			

			$principal = new ModelPrincipal();
			$result = $principal->inserir($id, $nome, $telefone, $telefone_recado, $email);
			if(!$result){
				$this->messageDanger("dc1");
				header('Location: /cadastro-principal');
				return;
			}
			
			$this->messageSuccess("sc2");
			header('Location: /home-logado');
			return;

		}catch(\Exception $e){

			$this->trataErro($e);

		}
		

	}

}

