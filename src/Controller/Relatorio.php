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

			//Estou fazendo consultas demais usar o padrão do livro que preenche variáveis $_SESSION A PARTIR DESSA CONSULTA DO RELATLÓRIO

			$id = $_SESSION['id'];
			// $id = 2;
			
			$tabela = "veiculos";
            //echo is_string($tabela);exit;
			$veiculos = ModelVeiculo::buscaPeloId($tabela, $id);

            $tabela = "veiculos_achados";
            $veiculosAchados = ModelVeiculo::buscaPeloId($tabela, $id);
            //var_dump($veiculosAchados);exit;

			$tabela = "documentos";			
			$documentos = ModelDocumento::buscaPeloId($tabela, $id);
			
			$tabela = "doc_achado";			
			$documentosAchados = ModelDocumento::buscaPeloId($tabela, $id);
			//var_dump($documentosAchados);exit;
			
			echo $this->renderizaHtml('relatorio/relatorio.php', [

				'titulo' => 'Relatório',
				'veiculos' => $veiculos,
				'veiculosAchados' => $veiculosAchados,
				'documentos' => $documentos,
				'documentosAchados' => $documentosAchados

			]);
			
		}catch(\Exception $e){
			$this->trataErro($e);
		}

	}
}
