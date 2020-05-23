<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelRegistro;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitEncripta;
use Projeto\APRJ\Services\ServiceTraitLimpaPost;
use Projeto\APRJ\Services\ServiceTraitFlashMessage;

class PersisteRegistro implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;
	use ServiceTraitEncripta;
	use ServiceTraitLimpaPost;
	use ServiceTraitFlashMessage;

	public function processaRequisicao(): void
	{
		
		try{
			
			//Inserção tabela Registro
			$post = $this->limpaPost($_POST);
			$email = $post['email'];
			$senha = $post['senha'];
			$ip = $_SESSION['ip'];
		    $data = $_SESSION['data'];

		    $_SESSION['email'] = $email;

			$registro = new ModelRegistro();
			//testa se já existe email
			$registroEmail = $registro->buscaIdPorEmail($email);

			if($registroEmail){ 

				$this->messageDanger("de1");
				header('Location: /registro');
				return;
				
				}	
			
		    $senhaEncriptada = $this->encriptaSenha($senha);	
			
			$registro->inserir($email, $senhaEncriptada, $ip, $data);
			//já está no banco
			$id_registro = $registro->buscaIdPorEmail($email);
			$_SESSION['id'] = $id_registro['id_registro'];
			

			header("Location: /cadastro-principal");
			return;

		}catch(\Exception $e){
			$this->trataErro($e);
		}

	}
}
