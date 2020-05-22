<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Model\ModelPrincipal;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitValidaInputNome;
use Projeto\APRJ\Services\ServiceTraitValidaInputTelefone;
use Projeto\APRJ\Services\ServiceTraitLimpaPost;

class PersistePrincipal
{
	use ServiceTraitErro;
	use ServiceTraitValidaInputNome;
	use ServiceTraitValidaInputTelefone;
	use ServiceTraitFilter;
	use ServiceTraitLimpaPost;
	
	public function processaRequisicao(): void
	{
		try{
			
			$post = $this->limpaPost($_POST);
			$id = $_SESSION['id'];
 			$email = $_SESSION['email'];
			

			$cadastroPrincipal = new ModelPrincipal();
			$result = $cadastroPrincipal->inserir($id, $post['nome'], $post['telefone'], $post['telefoneRecado'], $email);
			if(!$result){
				header('Location: /cadastro-principal');
				return;
			}
			$_SESSION['nome'] = $nome;

			header('Location: /home-logado');
			return;

		}catch(\Exception $e){

			$this->trataErro($e);

		}
		

	}

}


// $nome = $this->filtraString($_POST['nome_completo']);

// 			$telefone = $this->filtraString($_POST['telefone']);
			

// 			$telefoneRecado = $this->filtraString($_POST['telefone-recado']);

// 			$id = $_SESSION['id'];
// 			$email = $_SESSION['email'];