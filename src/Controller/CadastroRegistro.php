<?php
namespace Projeto\APRJ\Controller;


use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;

class CadastroRegistro implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{		
		$titulo = "Registre-se";
		require __DIR__ . '/../../view/cadastro/cadastro-registro.php';
	}
}