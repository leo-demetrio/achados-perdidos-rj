<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;

class HomeLogado extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		echo $this->renderizaHtml('home/home-logado.php', [

			'titulo' => 'Home Logado'

		]);

		// $titulo = "Home Logado";
		// require __DIR__ . '/../../view/home/home-logado.php';
	}
}
