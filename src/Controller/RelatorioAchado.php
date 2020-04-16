<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Model\ModelDocumento;
use Projeto\APRJ\Model\ModelDocumentoAchado;


class RelatorioAchado extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;

	public function processaRequisicao(): void
	{
		try{
			$docAchado = new ModelDocumentoAchado();
			$docAchadoBanco = $docAchado->buscaPeloNumero($numero);
			$docPerdido = new ModelDocumento();
			$docPerdidoBanco = $docPerdido->buscaPeloNumero($numero);

			if(!(isset($docAchadoBanco) && isset($docPerdidoBanco)){
				throw new \Exception("Documento com divergência");
			}


			echo $this->renderizaHtml('relatorio/relatorio-achados.php',[

			'titulo' => 'Relatorio Achados'
			'docPerdidoBanco' => $docPerdidoBanco,
			'docAchadoBanco'  => $docAchadoBanco

		]);
	}catch(\Exception $e){
		$this->trataErro($e);
	}
	}
}