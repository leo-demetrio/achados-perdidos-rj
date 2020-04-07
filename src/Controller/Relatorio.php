<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;
use Projeto\APRJ\Model\ModelDocumento;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Services\ServiceErro;


class Relatorio extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		try{

			$relatorioVeiculos = new ModelVeiculo();
			$relatorioVeiculos->setIdReg($_SESSION['id']);
			$veiculos = $relatorioVeiculos->buscaPeloId();

			$relatorioDocumetos = new ModelDocumento();
			$relatorioDocumetos->setIdReg($_SESSION['id']);
			$documentos = $relatorioDocumetos->buscaPeloId();


			
			echo $this->renderizaHtml('relatorio/relatorio.php', [

				'titulo' => 'Relatório',
				'veiculos' => $veiculos,
				'documentos' => $documentos

			]);
			
		}catch(\Exception $e){
			ServiceErro::trataErro($e);
		}


		// $titulo = "Relatorio";
		// require __DIR__ . '/../../view/relatorio/relatorio.php';
	}
}
