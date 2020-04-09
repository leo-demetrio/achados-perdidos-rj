<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitValidaData;
use Projeto\APRJ\Model\ModelDocumento;



class PersisteDocumento implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;
	use ServiceTraitValidaData;

	public function processaRequisicao(): void
	{
		use ServiceTraitFilter;

		try{

			$nome = $this->filtraString($_POST['nome']);
			$numero = $this->filtraString($_POST['numero']);
			$tipo = $this->filtraString($_POST['tipo-documento']);
			$situacao = $this->filtraString($_POST['situacao']);
			$id = $this->filtraInt($_SESSION['id']);
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
			$this->trataErro($e);
		}

	}
}
