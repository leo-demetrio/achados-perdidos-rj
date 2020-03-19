<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;
class PersisteVeiculo implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		$id = $_SESSION['id'];
		$placa = $_POST['placa'];
		$modelo = $_POST['modelo'];
		$cor = $_POST['cor'];
		$dataRegistro = $_SESSION['data'];
		$nomeProprietario = $_POST['nome-proprietario'];
		$situacao = $_POST['situacao'];

		$veiculo = new ModelVeiculo();
		$veiculo->inserir($id, $placa, $modelo, $cor, $dataRegistro, $nomeProprietario, $situacao);

		header('Location: /relatorio');
		die();


	}
}