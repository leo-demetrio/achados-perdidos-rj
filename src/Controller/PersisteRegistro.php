<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelRegistro;
use Projeto\APRJ\Services\ServiceFilter;
use Projeto\APRJ\Services\ServiceErro;
use Projeto\APRJ\Services\ServiceEncripta;

class PersisteRegistro implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		
		try{
			//Inserção tabela Registro

			$email = ServiceFilter::filtraEmail($_POST['email']);
		    $senha = ServiceFilter::filtraString($_POST['senha']);
		    $ip = $_SESSION['ip'];
		    $data = $_SESSION['data'];

		    $senhaEncriptada = ServiceEncripta::encriptaSenha($senha);
		    echo $senhaEncriptada;exit;
	
			$registro = new ModelRegistro();
			$registro->inserir($email, $senhaEncriptada, $ip, $data);
			$id = $registro->buscaIdPorEmail($email);
			$_SESSION['id'] = $id['id_registro'];
			$_SESSION['email'] = $email;

			//$_SESSION['id'] = ServiceFilter::filtraInt($id['id_registro']);
			// if(is_null($_SESSION['id']) || $_SESSION['id'] === false)
			// {
			// 	header('location: /cadastro-registro');
			// 	return;
			// }

			header("Location: /cadastro-principal");
			die();
		}catch(\Exception $e){
			ServiceErro::trataErro($e);
		}

	}
}
