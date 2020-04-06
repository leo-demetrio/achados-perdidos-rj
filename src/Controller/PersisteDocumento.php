<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceFilter;
use Projeto\APRJ\Services\ServiceErro;
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

			//$dataPerda = ServiceFilter::filtraString($_POST['data'])
			$id = ServiceFilter::filtraInt($_SESSION['id']);
			$dataRegistro= $_SESSION['data'];
			//echo $dataRegistro;exit;
			//var_dump($_POST);exit;

			$documento = new ModelDocumento();
			$documento->setNomeDocumento($nome);
			$documento->setNumeroDocumento($numero);
			$documento->setTipoDocumento($tipo);
			$documento->setDataPerda = date('d/m/y');
			$documento->setIdREg($id);
			$documento->setDataRegistro($dataRegistro);
			$documento->setSituacao($situacao);
			$documento->inserir();

			header('Location: /relatorio');
			// $dataPerda = ServiceFilter::filtraString($_POST['data']);
			// $id = $_SESSION['id'];
			// $dataRegistro= $_SESSION['data'];

			// var_dump($_POST);exit;

			

		}catch(\Exception $e){
			ServiceErro::trataErro($e);
		}

	}
}
