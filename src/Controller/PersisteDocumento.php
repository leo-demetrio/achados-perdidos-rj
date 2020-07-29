<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
// use Projeto\APRJ\Services\ServiceTraitFilter;
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
	// use ServiceTraitFilter;
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
			//echo $_SESSION['data'];exit;
			// print_r($post);exit;
		
			$documento = new ModelDocumento(

				$id_registro,
				$post['numero'],
				$post['tipo-documento'],
				$post['data_perda'],
				// $post['dataRegistro'],				
				$dataRegistro,				
				$post['nome'],
				$post['situacao']

			);

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


			
			if($post['situacao'] === 'achado'){	

				
					//se está no banco achado		
					if($docAchadoBanco){

						$this->messageSuccess("dd3");
						header('Location: /relatorio');
						return;
					}
					
					$tabela = "doc_achado";
					$documento->inserir($tabela);
					//se estiver no banco avisa o proprietário
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

						//mesgem para o dono do documento
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
					
				
			//fazer união dessa mensagem acima
			//verifica se o documento está no banco	
			if($docBanco){

				$this->messageSuccess("dd5");
				header('Location: /relatorio');
				return;
			}

			$tabela = "documentos";
			$documento->inserir($tabela);

			if(isset($docAchadoBanco['numero_documento'])){

				//enviar email

				$this->messageSuccess("dd6");
				header('Location: /relatorio');
				return;
				
			}

			$this->messageSuccess('sd1');
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