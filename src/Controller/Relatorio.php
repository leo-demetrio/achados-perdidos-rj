<?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelRelatorio;


class Relatorio implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		$relatorio = new ModelRelatorio();
		//$registros = $relatorio->buscaRegistros($_SESSION['id']);
		$registros = $relatorio->buscaRegistros("32");
		// echo $registros['nome'];exit;
		// echo "<pre>";
		// print_r($registros);exit;
		// foreach ($registros as $key => $value) {
		// 	echo $key." ".$value;
		// }exit;

		$titulo = "Relatorio";
		require __DIR__ . '/../../view/relatorio/relatorio.php';
	}
}
