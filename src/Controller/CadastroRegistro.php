<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Services;


use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;

class CadastroRegistro implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{	

		try{

			$titulo = "Registre-se";
			require __DIR__ . '/../../view/cadastro/cadastro-registro.php';

		}catch(\Exception $e){
			ServiceErro::trataErro($e);
		}
	}
}