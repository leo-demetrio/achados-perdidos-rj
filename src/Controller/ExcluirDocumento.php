<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelDocumento;


class ExcluirDocumento extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{

		$numero = $_GET['numero_documento'];
		$documento = new ModelDocumento();
		$documento->excluir($numero);



		header('Location: /relatorio');
		return ;

	}
}