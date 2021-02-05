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
use Projeto\APRJ\Model\ModelRegistro;




class PersisteDocumento implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitValidaData;
	use ServiceTraitFlashMessage;
	use ServiceTraitLimpaPost;
	

	public function processaRequisicao(): void
	{

		try{
		

			$post = $this->limpaPost($_POST);
			$dataRegistro= $_SESSION['data'];
			$id_registro = $_SESSION['id'];


			$documento = new ModelDocumento(

				$id_registro,
				$post['numero'],
				$post['tipo-documento'],
				$post['data_perda'],				
				$dataRegistro,				
				$post['nome'],
				$post['situacao']

			);
				

			//teste se o proprio já cadastrou
			$tabela = "documentos";
			$docBanco = $documento->buscaPeloNumero($tabela);
			
		
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

					//se estiver na tabela documentos como perdido/furtado avisa o proprietário
					if($docBanco) $this->enviaEmailPropietarioECadastrante($docBanco);
					
					//avisa cadastro efetuado 
					$this->avisaCadastroEfetuado($id_registro);

					header('Location: /relatorio');
					return;
				}
				//final situação achado
					
				
			//fazer união dessa mensagem acima
			//verifica se o documento está no banco cadastrado por outro	
			if($docBanco){
				$this->messageSuccess("dd5");
				header('Location: /relatorio');
				return;
			}

			
			//documento no banco achado
			if(isset($docAchadoBanco['numero_documento'])){
				// echo "aqui";exit;
				//inserir na tabela
				$tabela = "documentos";
				$documento->inserir($tabela);

				//pegar o email da pessoa que achou
				$emailProprietario = $this->buscaEmail($docAchadoBanco['id_reg']);

				
				//enviar email proprietário
				$email = new Email();
				 $verify = $email->addMensagem(
					"Documento achado",
					$this->messageSuccess("dd4"),
					$_SESSION['nome'],
					$emailProprietario
					//$_SESSION['email'],
					///"leopoldocd@hotmail.com"
				)->sendEmail();

				//enviar email próprio cadastrante
				$email = new Email();
				$verify = $email->addMensagem(
					"Documento achado",
					$this->messageSuccess("dd4"),
					$_SESSION['nome'],
					$_SESSION['email']
				)->sendEmail();

				
				$this->messageSuccess("sd3");
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
	private function buscaEmail($id_reg){
		$registro = new ModelRegistro();
		$result = $registro->buscaPeloId($id_reg);
		$emailProprietario = $result['email'];
		return $emailProprietario;

	}

	private function avisaCadastroEfetuado($id_registro){

		$modelRegistro = new ModelRegistro();
		$emailCadastrador = $modelRegistro->buscaPeloId($id_registro);
					
		$email = new Email();
		$email->addMensagem(

				"Documento cadastrado",
				$this->messageSuccess("da"),
				$_SESSION['nome'],
				$emailCadastrador['email'] 

		)->sendEmail();

	}

	private function enviaEmailPropietarioECadastrante($docBanco)
	{
		$emailProprietario = $this->buscaEmail($docBanco['id_reg']);

		//mesagem p quem está com documento cadastrante
		$email = new Email();
		$email->addMensagem(

			"Documento achado",
			$this->messageSuccess("dd4"),
			$_SESSION['nome'],
			$_SESSION['email'],
								
			)->sendEmail();

		//mensagem para o dono/proprietário do documento
		$email->addMensagem(

			"Documento achado",
			$this->messageSuccess("da"),
			$_SESSION['nome'],
			$emailProprietario 							
			)->sendEmail();

			$this->messageSuccess("dd4");

			header('Location: /relatorio');
			exit();
							

	}

}



