<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Services\ServiceErro;



class CadastroLogin extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		try{
			echo $this->renderizahtml('cadastro/cadastro-login.php', [
				
				'titulo' => 'Login'

			]);
		}catch(\Exception $e){
			ServiceErro::trataErro($e);
		}	
	}
}