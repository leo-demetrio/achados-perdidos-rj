<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelRelatorio;
use Projeto\APRJ\Controller\ControllerComHtml;


class Relatorio extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		$relatorio = new ModelRelatorio();
		//$registros = $relatorio->buscaRegistros($_SESSION['id']);
		$registros = $relatorio->buscaRegistros("32");
		 //echo $registros['placa'];exit;
		// echo "<pre>";
		 //print_r($registros);exit;
		// foreach ($registros as $key => $value) {
		// 	echo " ".$value;
		// }exit;

		echo $this->renderizaHtml('relatorio/relatorio.php', [

			'titulo' => 'Relatório',
			'registros' => $registros

		]);


		// $titulo = "Relatorio";
		// require __DIR__ . '/../../view/relatorio/relatorio.php';
	}
}