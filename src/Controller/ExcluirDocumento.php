<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelDocumento;
use Projeto\APRJ\Services\ServiceTraitFlashMessage;
use Projeto\APRJ\Services\ServiceTraitErro;


class ExcluirDocumento extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	use ServiceTraitFlashMessage;
	use ServiceTraitErro;

	public function processaRequisicao(): void
	{
		try{
		$numero = $_GET['numero_documento'];
		$result = ModelDocumento::excluir($numero);


		if($result){
			$this->messageSuccess('sd2');
		}else{
			$this->messageDanger($mdd9);
		}

		header('Location: /relatorio');
		return;

		}catch(Exception $e){
			$this->trataErro($e);

	}
		header('Location: /relatorio');
		return ;

	}
}