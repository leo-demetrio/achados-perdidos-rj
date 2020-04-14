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
	use ServiceTraitFilter;

	public function processaRequisicao(): void
	{

		try{


			$numero = $this->filtraString($_POST['numero']);
			$documento = new ModelDocumento();
			$documnetoBanco = $documento->buscaPeloNumero($numero);
			
			if($documnetoBanco){
				throw new \Exception('Esse documento já existe no banco');
			}

			$tipo = $this->filtraString($_POST['tipo-documento']);
			$nome = $this->filtraString($_POST['nome']);
			$situacao = $this->filtraString($_POST['situacao']);
			$id = $this->filtraInt($_SESSION['id']);
			$data_perda = $_POST['data_perda'];
			$dataRegistro= $_SESSION['data'];
			
			$documento->setNomeDocumento($nome);
			$documento->setNumeroDocumento($numero);
			$documento->setTipoDocumento($tipo);
			$documento->setDataPerda($data_perda);
			$documento->setIdREg($id);
			$documento->setDataRegistro($dataRegistro);
			$documento->setSituacao($situacao);
			$documento->inserir();

			$documento->inserir();

			header('Location: /relatorio');
			die();

			

		}catch(\Exception $e){
			$this->trataErro($e);
		}

	}
}
