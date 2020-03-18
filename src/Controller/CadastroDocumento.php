<?php
namespace Projeto\APRJ\Controller;


use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
class CadastroDocumento implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		$titulo = "Cadastro Documento";
		require __DIR__ . '/../../view/documento/cadastro-documento.php';
	}
}