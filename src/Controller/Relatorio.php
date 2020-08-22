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

			$id = $_SESSION['id'];
			// $id = 2;
			
			$tabela = "veiculos";
            //echo is_string($tabela);exit;
			$veiculos = ModelVeiculo::buscaPeloId($tabela, $id);


			$tabela = "documentos";			
			$documentos = ModelDocumento::buscaPeloId($tabela, $id);
			
			$tabela = "doc_achado";			
			$documentosAchados = ModelDocumento::buscaPeloId($tabela, $id);
			
			echo $this->renderizaHtml('relatorio/relatorio.php', [

				'titulo' => 'Relatório',
				'veiculos' => $veiculos,
				'documentos' => $documentos,
				'documentosAchados' => $documentosAchados

			]);
			
		}catch(\Exception $e){
			$this->trataErro($e);
		}

	}
}
