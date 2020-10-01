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

	    if($_GET['flag'] == 'true') {
	       
	        ModelVeiculoAchado::excluir($placa);
           
        }else {
			ModelVeiculo::excluir($placa);
		}			

		header('Location: /relatorio');
		return;
	}
}