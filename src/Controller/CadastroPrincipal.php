<?php

namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Services\ServiceErro;

class CadastroPrincipal extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		try{
			echo $this->renderizaHtml('cadastro/cadastro-principal.php', [

				'titulo' => 'Cadastro Principal'

			]);
		}catch(\Exception $e){
			ServiceErro::trataErro($e);
		}



		// $_SESSION['id'];
		// $titulo = "Cadastro Principal";
		// require __DIR__ . '/../../view/cadastro/cadastro-principal.php';
	}
}