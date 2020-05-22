<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitValidaData;
use Projeto\APRJ\Services\ServiceTraitLimpaPost;
use Projeto\APRJ\Services\ServiceTraitFlashMessage;
use Projeto\APRJ\Model\ModelDocumento;
use Projeto\APRJ\Model\ModelDocumentoAchado;




class PersisteDocumento implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;
	use ServiceTraitValidaData;
	use ServiceTraitFlashMessage;
	use ServiceTraitLimpaPost;
	

	public function processaRequisicao(): void
	{

		try{

			$post = $this->limpaPost($_POST);
			$data_perda = $_POST['data_perda'];
			$dataRegistro= $_SESSION['data'];
			$id_registro = $_SESSION['id'];

		
			$documento = new ModelDocumento(

				$id_registro,
				$post['numero'],
				$post['tipo-documento'],
				$post['data_perda'],
				$post['dataRegistro'],
				$post['nome'],
				$post['situacao']

			);

			$tabela = "documentos";
			$docBanco = $documento->buscaPeloNumero($tabela);
			

			//o mesmo não pode perder e achar o mesmo doc
			if($docBanco['id_reg'] == $id_registro){

				$this->messageSuccess("mdd1");				
				header("Location: /relatorio");
				return;					
			}		

			
			$tabela = "doc_achado";
			$docAchadoBanco = $documento->buscaPeloNumero($tabela);
			if(isset($docAchadoBanco['id_reg'])){ 
				$regAchadoBanco = $docAchadoBanco['id_reg'];
			}else{
				$regAchadoBanco = 0;
			}

			
			if($regAchadoBanco['id_reg'] == $id_registro){

				$this->messageSuccess("mdd2");
				header("Location: /relatorio");
				die();					
			}


			
			if($situacao === 'achado'){	
								
					if($docAchadoBanco){

						$this->messageSuccess("mdd3");
						header('Location: /relatorio');
						return;
					}
					
					$documentoAchado->inserirAchado();
					if($docBanco){

						$this->messageSuccess("mdd4");
						header('Location: /relatorio');
						return;
					}

					header('Location: /relatorio');
					die();
				}
					

			//fazer união dessa mensagem acima
			//verifica se o documento está no banco	
			if($docBanco){

				$this->messageSuccess("mdd5");
				header('Location: /relatorio');
				return;
			}

			$tabela = "documentos";
			$documento->inserir($tabela);

			if(isset($docAchadoBanco['numero_documento'])){

				//enviar email

				$this->messageSuccess("mdd6");
				header('Location: /relatorio');
				return;
				
			}

			header('Location: /relatorio');
			die();

			

		}catch(\Exception $e){
			$this->trataErro($e);
		}

	}
}



// $tipo = $this->filtraString($_POST['tipo-documento']);
// 			$nome = $this->filtraString($_POST['nome']);
// 			$id = $this->filtraInt($_SESSION['id']);
// $numero = $this->filtraString($_POST['numero']);
// 			$situacao = $this->filtraString($_POST['situacao']);


// $documentoAchado->setNomeDocumento($nome);
// 					$documentoAchado->setNumeroDocumento($numero);
// 					$documentoAchado->setTipoDocumento($tipo);
// 					$documentoAchado->setDataPerda($data_perda);
// 					$documentoAchado->setIdREg($id);
// 					$documentoAchado->setDataRegistro($dataRegistro);
// 					$documentoAchado->setSituacao($situacao);



			// die("veio");
			// $documento->setNomeDocumento($nome);
			// $documento->setNumeroDocumento($numero);
			// $documento->setTipoDocumento($tipo);
			// $documento->setDataPerda($data_perda);
			// $documento->setIdREg($id);
			// $documento->setDataRegistro($dataRegistro);
			// $documento->setSituacao($situacao);


// if(isset($docBanco['id_reg'])){ 
// 				$regBanco = $docBanco['id_reg'];
// 			}else{
// 				$regBanco = 0;



// 			}



// throw new \Exception("Documento em nossa base de dados, iremos entrar em contato com quem tem a posse do documento");