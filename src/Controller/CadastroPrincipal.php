<?php

namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
class CadastroPrincipal implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		
		$_SESSION['id'];
		$titulo = "Cadastro Principal";
		require __DIR__ . '/../../view/cadastro/cadastro-principal.php';
	}
}