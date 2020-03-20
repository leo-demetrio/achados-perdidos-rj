<?php

namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
class CadastroPrincipal extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		
		echo $this->renderizaHtml('cadastro/cadastro-principal.php', [

			'titulo' => 'Cadastro Principal'

		]);



		// $_SESSION['id'];
		// $titulo = "Cadastro Principal";
		// require __DIR__ . '/../../view/cadastro/cadastro-principal.php';
	}
}