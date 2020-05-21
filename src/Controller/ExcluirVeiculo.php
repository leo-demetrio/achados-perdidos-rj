<?php 


namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;


class ExcluirVeiculo implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		
		$placa = $_GET['placa'];
		ModelVeiculo::excluir($placa);

		header('Location: /relatorio');
		return;
	}
}