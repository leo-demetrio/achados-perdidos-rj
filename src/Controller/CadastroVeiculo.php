<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;

class CadastroVeiculo implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		require __DIR__ . '/../../view/veiculo/cadastra-veiculo.php';
	}
}