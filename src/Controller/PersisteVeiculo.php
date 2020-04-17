<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitFilter;

class PersisteVeiculo implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;
	
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
			if($veiculoBanco){
				throw new \Exception("Veículo já possui cadastro no sistema");				
			}
			

			
			$veiculo->setIdReg($id);
			$veiculo->setPlaca($placa);
			$veiculo->setModelo($modelo);
			$veiculo->setCor($cor);
			$veiculo->setDataRegistro($data);
			$veiculo->setNomeProprietario ($nomeProprietario);
			$veiculo->setSituacao($situacao);
			$veiculo->inserir();

			header('Location: /relatorio');
			die();
		}catch(\Exception $e){
			$this->trataErro($e);
		}


	}
}