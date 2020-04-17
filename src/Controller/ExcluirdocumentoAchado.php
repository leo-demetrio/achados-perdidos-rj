<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelDocumentoAchado;


class ExcluirDocumentoAchado extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		// var_dump($_GET);die('excluir');
		$numero = $_GET['numero_documento'];
		$documento = new ModelDocumentoAchado();
		$documento->excluir($numero);



		header('Location: /relatorio');
		return ;

	}
}