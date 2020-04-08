<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceFilter;
use Projeto\APRJ\Services\ServiceErro;
use Projeto\APRJ\Services\ServiceValidaData;
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
			$id = ServiceFilter::filtraInt($_SESSION['id']);
			$data_perda = $_POST['data_perda'];
			$dataRegistro= $_SESSION['data'];

			// $data_perda = ServiceValidaData::validaData($data_perda);
			// var_dump($data_perda);exit;
			//FALTA VALIDAR DATA
			//$date = preg_replace("([^0-9/])", "", $data_perda);
			//echo $date;exit;

			$documento = new ModelDocumento();
			$documento->setNomeDocumento($nome);
			$documento->setNumeroDocumento($numero);
			$documento->setTipoDocumento($tipo);
			$documento->setDataPerda($data_perda);
			$documento->setIdREg($id);
			$documento->setDataRegistro($dataRegistro);
			$documento->setSituacao($situacao);
			$documento->inserir();

			header('Location: /relatorio');
			die();

			

		}catch(\Exception $e){
			ServiceErro::trataErro($e);
		}

	}
}
