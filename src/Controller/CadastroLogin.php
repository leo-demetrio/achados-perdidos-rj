<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Services\ServiceTraitErro;



class CadastroLogin extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	
	public function processaRequisicao(): void
	{
		try{
	
			echo $this->renderizaHtml('cadastro/cadastro-login.php', [
				
				'titulo' => 'Login'

			]);
			
		}catch(\Exception $e){
			$this->trataErro($e);
		}	
	}
}