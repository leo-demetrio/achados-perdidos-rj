<?php

namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;

final class Sair implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void 
	{
		session_destroy();
		header('Location:  /login');
		die();
	}
}
