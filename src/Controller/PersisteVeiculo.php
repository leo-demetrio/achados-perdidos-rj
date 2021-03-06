<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;
use Projeto\APRJ\Model\ModelVeiculoAchado;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitValidaData;
use Projeto\APRJ\Services\ServiceTraitLimpaPost;
use Projeto\APRJ\Services\ServiceTraitFlashMessage;

class PersisteVeiculo implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitValidaData;
	use ServiceTraitLimpaPost;
	use ServiceTraitFlashMessage;
	
	public function processaRequisicao(): void
	{


		try{

			$post = $this->limpaPost($_POST);
			$this->verificaPlacaRegex($_POST['placa']);
			$data = $_SESSION['data'];
			$id_registro = $_SESSION['id'];

			$veiculo = new ModelVeiculo(

			$id_registro,
			$post['placa'],
			$post['modelo'],
			$post['cor'],
			$data, $post['nome-proprietario'],
			$post['situacao']


			);
            //echo $_POST['flag'];exit;
			if($_POST['flag'] == 'true'){
                $veiculo->editar();
                header('location: /relatorio');
                return;
            }
			//echo "passou";
			//exit;

			//fazer um join para unir as duas consultas
			//testa se o próprio já cadastrou
			$tabela = "veiculos";
			$veiculoBanco = $veiculo->buscaPelaPlaca($tabela);

			if($veiculoBanco['id_reg'] == $id_registro){
				$veiculoBanco['id_reg'];
				$this->messageDanger('dv6');
				header('Location: /relatorio');
				return;				
			}

			//testa se o próprio já cadastrou como achado
			$tabela = "veiculos_achados";
			$veiculoAchadoBanco = $veiculo->buscaPelaPlaca($tabela);
			
			
			if($veiculoAchadoBanco['id_reg'] == $id_registro){

				$this->messageDanger("dv1");
				header('Location: /relatorio');
				return;	
			
			}
			//testa situação achado
			if($post['situacao'] === 'achado'){

				//se está no banco achado
				if($veiculoAchadoBanco){

					$this->messageDanger("dv2");
					header('Location:/relatorio');
					return;

					}
					
			

					//inserir na tabela
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
				$this->messageSuccess("sv1");
				header('Location: /relatorio');
				die();

			}
			//final situação achado

			//testa se já foi cadastrado
			if($veiculoBanco){
				$this->messageDanger("dv4");
				return;
			}		

			//insere na tabela
			$tabela = "veiculos";
			$veiculo->inserir($tabela);
			$this->messageSuccess("sv1");


			//veículo no banco parar devolver
			if($veiculoAchadoBanco){

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
				$this->messageDanger("dv5");
				return;		
			}

			header('Location: /relatorio');
			return;

		}catch(\Exception $e){
			$this->trataErro($e);
		}


	}
	private function verificaPlacaRegex($placa){

		if (!(strlen($placa) === 7)) {
			$this->messageDanger("dv7");
			header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
 			exit;
		}

			$placa = strtolower($placa);
			$regex_placa_antiga = "/^[a-z]{3}[0-9]{4}$/";
			$regex_placa_nova = "/^[a-z]{3}[0-9]{1}[a-z]{1}[0-9]{2}$/";
			$result1 = preg_match($regex_placa_antiga,$placa);
			$result2 = preg_match($regex_placa_nova,$placa);
			if($result1 || $result2) return;
			header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
			exit;			
	}
}









