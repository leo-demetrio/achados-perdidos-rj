<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceFilter;

class PersistePrincipal
{
	public function processaRequisicao(): void
	{
		$nome = ServiceFilter::filtraString($_POST['nome']);
		$telefone = ServiceFilter::filtraString($_POST['telefone']);
		$telefoneRecado = ServiceFilter::filtraString($_POST['telefone-recado']);


	}

}