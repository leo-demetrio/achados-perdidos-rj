<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelRegistro;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitEncripta;

class PersisteRegistro implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;
	use ServiceTraitEncripta;

	public function processaRequisicao(): void
	{
		
		try{
			//Inserção tabela Registro
			$email = $this->filtraEmail($_POST['email']);
			$registro = new ModelRegistro();
			$registroEmail = $registro->buscaIdPorEmail($email);

			if($registroEmail){ 
				throw new \Exception("O email já possui cadastro!!");
				}	

			$senha = $this->filtraString($_POST['senha']);
		    $senhaEncriptada = $this->encriptaSenha($senha);

		    $ip = $_SESSION['ip'];
		    $data = $_SESSION['data'];
	
			
			$registro->inserir($email, $senhaEncriptada, $ip, $data);
			
			$id_registro = $registro->buscaIdPorEmail($email);
			$_SESSION['id'] = $id_registro['id_registro'];//arraya associativo
			$_SESSION['email'] = $email;

			header("Location: /cadastro-principal");
			die();

		}catch(\Exception $e){
			$this->trataErro($e);
		}

	}
}
