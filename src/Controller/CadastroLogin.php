<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
class CadastroLogin implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		$titulo = "Login";
		require __DIR__ . '/../../view/cadastro/cadastro-login.php';
	}
}