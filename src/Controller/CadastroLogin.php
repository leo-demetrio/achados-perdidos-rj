<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;



class CadastroLogin extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{

		echo $this->renderizahtml('cadastro/cadastro-login.php', [
			
			'titulo' => 'Login'

		]);
	}
}