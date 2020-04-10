<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceTraitErro;




class CadastroRegistro implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	
	public function processaRequisicao(): void
	{	

		try{

			$titulo = "Registre-se";
			require __DIR__ . '/../../view/cadastro/cadastro-registro.php';

		}catch(\Exception $e){
			$this->trataErro($e);
		}
	}
}