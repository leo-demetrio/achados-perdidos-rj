<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Services\ServiceTraitErro;

class HomeLogado extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	
	public function processaRequisicao(): void
	{
		try{
			echo $this->renderizaHtml('home/home-logado.php', [

				'titulo' => 'Home Logado'

			]);
		}catch(\Exception $e){
			$this->trataErro($e);
		}

		// $titulo = "Home Logado";
		// require __DIR__ . '/../../view/home/home-logado.php';
	}
}
