<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Services\ServiceErro;

class HomeLogado extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		try{
			echo $this->renderizaHtml('home/home-logado.php', [

				'titulo' => 'Home Logado'

			]);
		}catch(\Exception $e){
			ServiceErro::trataErro($e);
		}

		// $titulo = "Home Logado";
		// require __DIR__ . '/../../view/home/home-logado.php';
	}
}
