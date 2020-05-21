<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;
use Projeto\APRJ\Model\ModelDocumento;
use Projeto\APRJ\Model\ModelDocumentoAchado;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Model\ModelDao;


class Relatorio extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	
	public function processaRequisicao(): void
	{
		try{
			$dao = new ModelDao();
			$dao->buscaTodosRegistros($_SESSION['id']);


			//fazer um join com todas consultas
			$veiculos = ModelVeiculo::buscaPeloId($_SESSION['id']);

			// $relatorioDocumetos = new ModelDocumento();
			// $relatorioDocumetos->setIdReg($_SESSION['id']);
			$documentos = ModelDocumento::buscaPeloId($_SESSION['id']);

			$relatorioDocumetosAchados = new ModelDocumentoAchado();
			$relatorioDocumetosAchados->setIdReg($_SESSION['id']);
			$documenetosAchados = $relatorioDocumetosAchados->buscaPeloId();
			
			echo $this->renderizaHtml('relatorio/relatorio.php', [

				'titulo' => 'Relatório',
				'veiculos' => $veiculos,
				'documentos' => $documentos,
				'documentosAchados' => $documenetosAchados

			]);
			
		}catch(\Exception $e){
			$this->trataErro($e);
		}


		// $titulo = "Relatorio";
		// require __DIR__ . '/../../view/relatorio/relatorio.php';
	}
}
