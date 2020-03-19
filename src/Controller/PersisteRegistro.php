<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelRegistro;
use Projeto\APRJ\Services\ServiceFilter;

class PersisteRegistro implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		//Inserção tabela Registro
		$email = ServiceFilter::filtraEmail($_POST['email']);
	    $senha = ServiceFilter::filtraString($_POST['senha']);
	    $ip = $_SESSION['ip'];
	    $data = $_SESSION['data'];
		$registro = new ModelRegistro();
		$registro->inserir($email, $senha, $ip, $data);
		$id = $registro->buscaIdPorEmail($email);
		$_SESSION['id'] = ServiceFilter::filtraInt($id['id_registro']);
		
		// if(is_null($_SESSION['id']) || $_SESSION['id'] === false)
		// {
		// 	header('location: /cadastro-registro');
		// 	return;
		// }

		header("Location: /cadastro-principal");
		die();

	}
}
