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


			$documento = new ModelDocumento();
			$docBanco = $documento->buscaPeloNumero($numero);
			if(isset($docBanco['id_reg'])){ 
				$regBanco = $docBanco['id_reg'];
			}else{
				$regBanco = 0;
			}


			$documentoAchado = new ModelDocumentoAchado();
			$docAchadoBanco = $documentoAchado->buscaPeloNumero($numero);
			if(isset($docAchadoBanco['id_reg'])){ 
				$regAchadoBanco = $docAchadoBanco['id_reg'];
			}else{
				$regAchadoBanco = 0;
			}

			//o mesmo não pode perder e achar
			if($regBanco == $id || $regAchadoBanco == $id){
				throw new \Exception("Você já cadastrou esse documento");
				//vai p relatório						
			}		

			
			if($situacao === 'achado'){	
										
					if(isset($docAchadoBanco)){
						throw new \Exception('Este documento já possui cadastro como achado no banco')

					}
					$documentoAchado->setNomeDocumento($nome);
					$documentoAchado->setNumeroDocumento($numero);
					$documentoAchado->setTipoDocumento($tipo);
					$documentoAchado->setDataPerda($data_perda);
					$documentoAchado->setIdREg($id);
					$documentoAchado->setDataRegistro($dataRegistro);
					$documentoAchado->setSituacao($situacao);
					$documentoAchado->inserir();//die("inseriru");

					//verifica se possui cadastro no banco para devolver
					if($docBanco){

						throw new \Exception('Este documento foi encontrado em nosso sistema seu proprietário será notificado');

					}

					header('Location: /relatorio');
				}
					

			
					
			if($docBanco){
				throw new \Exception('Esse documento já foi cadastrado no banco');
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
