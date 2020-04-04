<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Services\ServiceErro;

class CadastroVeiculo extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		try{
			echo $this->renderizaHtml('veiculo/cadastra-veiculo.php', [

				'titulo' => 'CadastroVeiculo'

			]);
			
		}catch(\Exception $e){
			ServiceErro::trataErro($e);
		}

		// $titulo = "Cadastro Veiculo";
		// require __DIR__ . '/../../view/veiculo/cadastra-veiculo.php';
	}
}