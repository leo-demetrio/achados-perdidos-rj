<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;
use Projeto\APRJ\Model\ModelVeiculoAchado;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitValidaData;
use Projeto\APRJ\Services\ServiceTraitLimpaPost;

class PersisteVeiculo implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;
	use ServiceTraitValidaData;
	use ServiceTraitLimpaPost;
	
	public function processaRequisicao(): void
	{

		try{

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

				//falta mensagem de já tem cadastro
				$_SESSION['tipo_mensagem'] = "danger";
				$_SESSION['mensagem'] = "Você já cadastrou em nosso banco!";
				header('Location: /relatorio');
				return;	
			
			}
			
			if($post['situacao'] === 'achado'){


				if($veiculoAchadoBanco){

					$_SESSION['tipo_mensagem'] = "danger";
					$_SESSION['mensagem'] = "Este veículo já possui cadastro como achado no banco";
					header('Location:/relatorio');
					return;

					}
					echo "veiculos achado";exit;
			


					$tabela = "veiculos_achado";
					$veiculoBanco->inserir($tabela);
						

				//verifica se possui cadastro no banco para devolver
				if($veicBanco){
					$_SESSION['tipo_mensagem'] = "danger";
					$_SESSION['mensagem'] = "Este veículo foi encontrado em nosso sistema seu proprietário será notificado";
					return;

				}
				header('Location: /relatorio');
				die();

			}

			if($veicBanco){

					$_SESSION['tipo_mensagem'] = "danger";
					$_SESSION['mensagem'] = "Este veículo já foi cadastrado no banco";
					return;
			}		

			
			$tabela = "veiculos";
			$veiculo->inserir($tabela);

		
			if($veiculoAchadoBanco){

				$_SESSION['tipo_mensagem'] = "danger";
				$_SESSION['mensagem'] = "O veículo se encontra em nossa base de dados iremos entrar em contato com quem está em posse dele";
				
			}

			header('Location: /relatorio');
			die();

		}catch(\Exception $e){
			$this->trataErro($e);
		}


	}
}










			// $placa = $this->filtraString($_POST['placa']);
			// $modelo = $this->filtraString($_POST['modelo']);
			// $cor = $this->filtraString($_POST['cor']);
			// $nomeProprietario = $this->filtraString($_POST['nome-proprietario']);
			// $situacao = $this->filtraString($_POST['situacao']);
			

			// $veiculoAchado->setIdReg($id_registro);
			// 		$veiculoAchado->setPlaca($post['placa']);
			// 		$veiculoAchado->setModelo($post['modelo']);
			// 		$veiculoAchado->setCor($post['cor']);
			// 		$veiculoAchado->setDataRegistro($post['data']);
			// 		$veiculoAchado->setNomeProprietario ($post['nomeProprietario']);
			// 		$veiculoAchado->setSituacao($post['situacao']);


// $veiculo->setIdReg($post['id']);
// 			$veiculo->setPlaca($post['placa']);
// 			$veiculo->setModelo($post['modelo']);
// 			$veiculo->setCor($post['cor']);
// 			$veiculo->setDataRegistro($post['data']);
// 			$veiculo->setNomeProprietario ($post['nomeProprietario']);
// 			$veiculo->setSituacao($post['situacao']);


// if(isset($veiculoAchadoBanco['id_reg'])){
			// 	$veicAchadoBanco = $veiculoAchadoBanco['id_reg'];
			// }else{
			// 	$veicAchadoBanco = 0;
			// }
			// echo $veicAchadoBanco;exit;
			//o mesmo não pode perder e achar


// if(isset($veiculoBanco['id_reg'])){
// 				$veicBanco = $veiculoBanco['id_reg'];
// 			}else{
// // 				$veicBanco = 0;
// // 			}


// throw new \Exception('O veículo se encontra em nossa base de dados iremos entrar em contato com que está em posse dele');