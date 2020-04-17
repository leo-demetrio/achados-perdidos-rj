<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelDocumentoAchado;
use Projeto\APRJ\Services\ServiceTraitErro;


class ExcluirDocumentoAchado extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	
	public function processaRequisicao(): void
	{
		try{
			// var_dump($_GET);die('excluir');
			$numero = $_GET['numero_documento'];
			$documento = new ModelDocumentoAchado();
			$resultado = $documento->excluir($numero);
			if($resultado){
				header('Location: /relatorio');
				return ;
			}	
		}catch(\Exception $e){
			$this->trataErro($e);
		}	

	}
}