<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;
use Projeto\APRJ\Model\ModelVeiculoAchado;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitValidaData;
use Projeto\APRJ\Services\ServiceTraitLimpaPost;
use Projeto\APRJ\Services\ServiceTraitFlashMessage;

class PersisteVeiculo implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;
	use ServiceTraitValidaData;
	use ServiceTraitLimpaPost;
	use ServiceTraitFlashMessage;
	
	public function processaRequisicao(): void
	{

		try{
			// $this->messageDanger("dv5");
			$post = $this->limpaPost($_POST);
			$data = $_SESSION['data'];
			$id_registro = $_SESSION['id'];

			$veiculo = new ModelVeiculo(

			$id_registro,
			$post['placa'],
			$post['modelo'],
			$post['cor'],
			$post['dataRegistro'],
			$post['nomeProprietario'],
			$post['situacao']			

			);

			//fazer um join para unir as duas consultas
			$tabela = "veiculos";
			$veiculoBanco = $veiculo->buscaPelaPlaca($tabela);
			
			if($veiculoBanco['id_reg'] == $id_registro){
				//falta mensagem de já tem cadastro
				header('Location: /relatorio');
				return;				
			}

			
			$tabela = "veiculos_achados";
			$veiculoAchadoBanco = $veiculo->buscaPelaPlaca($tabela);
			
			
			if($veiculoAchadoBanco['id_reg'] == $id_registro){

				$this->messageDanger("dv1");
				header('Location: /relatorio');
				return;	
			
			}
			
			if($post['situacao'] === 'achado'){

				//se está no banco achado
				if($veiculoAchadoBanco){

					$this->messageDanger("dv2");
					header('Location:/relatorio');
					return;

					}
					
			


					$tabela = "veiculos_achados";
					$veiculo->inserir($tabela);
						

				//verifica se possui cadastro no banco para devolver
				if($veiculoBanco){

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

					$this->messageDanger("dv3");
					header('Location: /relatorio');
					return;

				}
				$this->messageSuccess("sv1")
				header('Location: /relatorio');
				die();

			}

			if($veicBanco){
				$this->messageDanger("dv4");
				return;
			}		

			
			$tabela = "veiculos";
			$veiculo->inserir($tabela);
			$this->messageSuccess("sv1");


		
			if($veiculoAchadoBanco){
				$this->messageDanger("dv5");		
			}

			header('Location: /relatorio');
			die();

		}catch(\Exception $e){
			$this->trataErro($e);
		}


	}
}









