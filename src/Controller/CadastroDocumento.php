<?php
namespace Projeto\APRJ\Controller;


use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;

class CadastroDocumento extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		$titulo = "Cadastro Documento";

		echo $this->renderizaHtml('documento/cadastro-documento.php', [
			'titulo' => 'Cadastro Documento'
		]);
	}
}