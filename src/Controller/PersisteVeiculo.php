<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;
use Projeto\APRJ\Model\ModelVeiculoAchado;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitValidaData;

class PersisteVeiculo implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;
	use ServiceTraitValidaData;
	
	public function processaRequisicao(): void
	{

		try{

			$placa = $this->filtraString($_POST['placa']);
			$modelo = $this->filtraString($_POST['modelo']);
			$cor = $this->filtraString($_POST['cor']);
			$nomeProprietario = $this->filtraString($_POST['nome-proprietario']);
			$situacao = $this->filtraString($_POST['situacao']);
			$data = $_SESSION['data'];
			$id = $_SESSION['id'];

			
			$veiculo = new ModelVeiculo();
			$veiculoBanco = $veiculo->buscaPelaPlaca($placa);
			if(isset($veiculoBanco['id_reg'])){
				$veicBanco = $veiculoBanco['id_reg'];
			}else{
				$veicBanco = 0;
			}
			if($veicBanco == $id){
				throw new \Exception("Você já cadastrou no sistema");				
			}

			$veiculoAchado = new ModelVeiculoAchado();
			$veiculoAchadoBanco = $veiculoAchado->buscaPelaPlaca($placa);
			if(isset($veiculoAchadoBanco['id_reg'])){
				$veicAchadoBanco = $veiculoAchadoBanco['id_reg'];
			}else{
				$veicAchadoBanco = 0;
			}


			//o mesmo não pode perder e achar
			if($veicAchadoBanco == $id){
				throw new \Exception("Você já cadastrou no sistema");				
			}

			if($situacao === 'achado'){

				if($veicAchadoBanco){
						throw new \Exception('Este veículo já possui cadastro como achado no banco');

					}

					$veiculoAchado->setIdReg($id);
					$veiculoAchado->setPlaca($placa);
					$veiculoAchado->setModelo($modelo);
					$veiculoAchado->setCor($cor);
					$veiculoAchado->setDataRegistro($data);
					$veiculoAchado->setNomeProprietario ($nomeProprietario);
					$veiculoAchado->setSituacao($situacao);
					$veiculoAchado->inserir();
						

				//verifica se possui cadastro no banco para devolver
				if($veicBanco){

					throw new \Exception('Este veículo foi encontrado em nosso sistema seu proprietário será notificado');

				}
				header('Location: /relatorio');
				die();

			}

			if($veicBanco){
				throw new \Exception('Este veículo já foi cadastrado no banco');
			}		

		
			$veiculo->setIdReg($id);
			$veiculo->setPlaca($placa);
			$veiculo->setModelo($modelo);
			$veiculo->setCor($cor);
			$veiculo->setDataRegistro($data);
			$veiculo->setNomeProprietario ($nomeProprietario);
			$veiculo->setSituacao($situacao);
			$veiculo->inserir();

		
			if(isset($veiculoAchadoBanco['placa'])){
				throw new \Exception('O veículo se encontra em nossa base de dados iremos entrar em contato com que está em posse dele');
			}

			header('Location: /relatorio');
			die();
		}catch(\Exception $e){
			$this->trataErro($e);
		}


	}
}