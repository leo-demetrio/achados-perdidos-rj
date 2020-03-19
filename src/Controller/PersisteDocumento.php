<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceFilter;
use Projeto\APRJ\Model\ModelDocumentos;

class PersisteDocumento implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		$nome = ServiceFilter::filtraString($_POST['nome']);
		$numero = ServiceFilter::filtraString($_POST['numero']);
		$tipo = ServiceFilter::filtraString($_POST['tipo-documento']);
		$situacao = ServiceFilter::filtraString($_POST['situacao']);
		$dataPerda = ServiceFilter::filtraString($_POST['data']);
		$id = $_SESSION['id'];
		$dataRegistro= $_SESSION['data'];

		var_dump($_POST);exit;
	}
}
