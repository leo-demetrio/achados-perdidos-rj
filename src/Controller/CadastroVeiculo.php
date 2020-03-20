<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;

class CadastroVeiculo extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{

		echo $this->renderizaHtml('veiculo/cadastra-veiculo.php', [

			'titulo' => 'CadastroVeiculo'

		]);

		// $titulo = "Cadastro Veiculo";
		// require __DIR__ . '/../../view/veiculo/cadastra-veiculo.php';
	}
}