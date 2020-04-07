<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;
use Projeto\APRJ\Services\ServiceErro;
use Projeto\APRJ\Services\ServiceFilter;

class PersisteVeiculo implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		try{

			$placa = ServiceFilter::filtraString($_POST['placa']);
			$modelo = ServiceFilter::filtraString($_POST['modelo']);
			$cor = ServiceFilter::filtraString($_POST['cor']);
			$nomeProprietario = ServiceFilter::filtraString($_POST['nome-proprietario']);
			$situacao = ServiceFilter::filtraString($_POST['situacao']);
			$data = $_SESSION['data'];
			$id = $_SESSION['id'];

			$veiculo = new ModelVeiculo();
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
			ServiceErro::trataErro($e);
		}


	}
}