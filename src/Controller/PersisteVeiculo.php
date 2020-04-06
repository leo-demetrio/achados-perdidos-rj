<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;
use Projeto\APRJ\Services\ServiceErro;

class PersisteVeiculo implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		try{

			$veiculo = new ModelVeiculo();
			$veiculo->setId($_SESSION['id']);
			$veiculo->setPlaca($_POST['placa']);
			$veiculo->setModelo($_POST['modelo']);
			$veiculo->setCor($_POST['cor']);
			$veiculo->setDataRegistro($_SESSION['data']);
			$veiculo->setNomeProprietario ($_POST['nome-proprietario']);
			$veiculo->setSituacao($_POST['situacao']);
			$veiculo->inserir();

			header('Location: /relatorio');
			die();
		}catch(\Exception $e){
			ServiceErro::trataErro($e);
		}


	}
}