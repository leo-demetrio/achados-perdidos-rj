<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceFilter;
use Projeto\APRJ\Model\ModelDocumento;

class PersisteDocumento implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		try{
		$nome = ServiceFilter::filtraString($_POST['nome']);
		$numero = ServiceFilter::filtraString($_POST['numero']);
		$tipo = ServiceFilter::filtraString($_POST['tipo-documento']);
		$situacao = ServiceFilter::filtraString($_POST['situacao']);
		//$dataPerda = ServiceFilter::filtraString($_POST['data']);
		$dataPerda = date('d/m/y');
		$id = ServiceFilter::filtraInt($_SESSION['id']);
		$dataRegistro= $_SESSION['data'];
		//echo $dataRegistro;exit;
		//var_dump($_POST);exit;

		$documento = new ModelDocumento();
		$documento->inserir($id, $numero, $tipo, $dataPerda,$dataRegistro, $nome, $situacao);
	}catch(Exception $e){
		echo $e->getMessage();
	}
	}
}
