<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitValidaData;
use Projeto\APRJ\Model\ModelDocumento;
use Projeto\APRJ\Model\ModelDocumentoAchado;




class PersisteDocumento implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;
	use ServiceTraitValidaData;
	use ServiceTraitFilter;

	public function processaRequisicao(): void
	{

		try{

			$tipo = $this->filtraString($_POST['tipo-documento']);
			$nome = $this->filtraString($_POST['nome']);
			$id = $this->filtraInt($_SESSION['id']);
			$data_perda = $_POST['data_perda'];
			$dataRegistro= $_SESSION['data'];

			$numero = $this->filtraString($_POST['numero']);			
			$situacao = $this->filtraString($_POST['situacao']);

			//verifica e cruza dados de documento encontrado
			$documento = new ModelDocumento();

			if($situacao === 'achado'){

			
				$docBanco = $documento->buscaPeloNumero($numero);
				// var_dump($docBanco);die();

				//se tiver registro insere na tabela achados
				if(isset($docBanco)){

					$documento = new ModelDocumentoAchado();
					if(isset($documento)){
						throw new \Exception("Este documento já possui cadastro, vá para relatório");
						
					}
					$documento->setNomeDocumento($nome);
					$documento->setNumeroDocumento($numero);
					$documento->setTipoDocumento($tipo);
					$documento->setDataPerda($data_perda);
					$documento->setIdREg($id);
					$documento->setDataRegistro($dataRegistro);
					$documento->setSituacao($situacao);
					$documento->inserir();//die("inseriru");

					header('Location: /relatorio');
				}

				
				die("persiste");

			}

			
			$documnetoBanco = $documento->buscaPeloNumero($numero);
			
			if($documnetoBanco){
				throw new \Exception('Esse documento já existe no banco');
			}

			
			
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
