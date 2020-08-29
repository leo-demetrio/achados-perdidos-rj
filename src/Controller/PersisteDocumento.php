<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitValidaData;
use Projeto\APRJ\Services\ServiceTraitLimpaPost;
use Projeto\APRJ\Services\ServiceTraitFlashMessage;
use Projeto\APRJ\Model\ModelDocumento;
use Projeto\APRJ\Model\ModelDocumentoAchado;
use Projeto\APRJ\Suport\Email;




class PersisteDocumento implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitValidaData;
	use ServiceTraitFlashMessage;
	use ServiceTraitLimpaPost;
	

	public function processaRequisicao(): void
	{

		try{
			
			// var_dump($_POST);exit;
			$post = $this->limpaPost($_POST);
			$data_perda = $_POST['data_perda'];
			$dataRegistro= $_SESSION['data'];
			$id_registro = $_SESSION['id'];
			//echo $_SESSION['data'];exit;
			// print_r($post);exit;
		
			$documento = new ModelDocumento(

				$id_registro,
				$post['numero'],
				$post['tipo-documento'],
				$post['data_perda'],				
				$dataRegistro,				
				$post['nome'],
				$post['situacao']

			);

			// echo $_POST['id_doc'];exit;
			if (!empty($_POST['id_doc'])) {
				$documento->editar($_POST['id_doc'],'documentos');
				header('Location: /relatorio');
				return;
			}

			//teste se o proprio já cadastrou
			$tabela = "documentos";
			$docBanco = $documento->buscaPeloNumero($tabela);
			// var_dump($docBanco);echo "<br>".$id_registro;exit;
			if($docBanco['id_reg'] == $id_registro){
				
				$this->messageSuccess("dd1");				
				header("Location: /relatorio");
				return;					
			}		
			
			//teste se o proprio já cadastrou como achado
			$tabela = "doc_achado";
			$docAchadoBanco = $documento->buscaPeloNumero($tabela);
			
			if($docAchadoBanco['id_reg'] == $id_registro){

				$this->messageSuccess("dd2");
				header("Location: /relatorio");
				die();					
			}


			//testa situação achado
			if($post['situacao'] === 'achado'){	

				
					//se está no banco achado p não repetir dois registros		
					if($docAchadoBanco){

						$this->messageSuccess("dd3");
						header('Location: /relatorio');
						return;
					}
					
					$tabela = "doc_achado";
					$documento->inserir($tabela);
					//se estiver no banco como perdido avisa o proprietário
					if($docBanco){

						//mesagem p quem está com documento
						$email = new Email();
						$email->addMensagem(

							"Documento achado",
							$this->messageSuccess("dd4"),
							$_SESSION['nome'],
							//$_SESSION['email'],
							"leopoldocd@hotmail.com"
						)->sendEmail();

						//mensagem para o dono do documento
						$email->addMensagem(

							"Documento achado",
							$this->messageSuccess("da"),
							$_SESSION['nome'],
							//$_SESSION['email'],
							"leopoldocd@hotmail.com"
							
						)->sendEmail();

						$this->messageSuccess("dd4");
						header('Location: /relatorio');
						return;
					}

					header('Location: /relatorio');
					return;
				}
				//final situação achado
					
				
			//fazer união dessa mensagem acima
			//verifica se o documento está no banco	
			if($docBanco){

				$this->messageSuccess("dd5");
				header('Location: /relatorio');
				return;
			}

			
			//documento no banco achado
			if(isset($docAchadoBanco['numero_documento'])){

				//inserir na tabela
				$tabela = "documentos";
				$documento->inserir($tabela);

				//enviar email proprietário
				$email = new Email();
				$email->addMensagem(
					"Documento achado",
					$this->messageSuccess("dd4"),
					$_SESSION['nome'],
					//$_SESSION['email'],
					"leopoldocd@hotmail.com"
				)->sendEmail();

				//enviar email próprio para notificar sobre entrega
				$email = new Email();
				$email->addMensagem(
					"Documento achado",
					$this->messageSuccess("dd4"),
					$_SESSION['nome'],
					//$_SESSION['email'],
					"leopoldocd@hotmail.com"
				)->sendEmail();

				$this->messageSuccess("dd6");
				header('Location: /relatorio');
				return;
				
			}

			$tabela = "documentos";
			$documento->inserir($tabela);

			$this->messageSuccess('sd1');
			header('Location: /relatorio');
			return;

			

		}catch(\Exception $e){
			$this->trataErro($e);
		}

	}
}



