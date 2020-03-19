<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;

class HomeLogado implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		$titulo = "Home Logado";
		require __DIR__ . '/../../view/home/home-logado.php';
	}
}
