<?php 


namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;
use Projeto\APRJ\Model\ModelVeiculoAchado;


class ExcluirVeiculo implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
        $placa = $_GET['placa'];

	    if(GET['flag']) {
	        echo GET['flag']."aqui";exit;
	        ModelVeiculoAchado::excluir($placa);
            header('Location: /relatorio');
            return;
        }
		

		ModelVeiculo::excluir($placa);

		header('Location: /relatorio');
		return;
	}
}