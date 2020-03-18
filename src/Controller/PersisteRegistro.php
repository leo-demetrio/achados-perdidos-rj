<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelRegistro;
use Projeto\APRJ\Services\ServiceFilter;

class PersisteRegistro implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		$email = ServiceFilter::filtraEmail($_POST['email']);
		 $senha = ServiceFilter::filtraString($_POST['senha']);

		$registro = new ModelRegistro();
		$registro->inserir($email, $senha, $_SESSION['ip'], $_SESSION['data']);
	}
}
