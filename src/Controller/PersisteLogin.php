<?php

namespace Projeto\APRJ\Controller;


use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelLogin;
use Projeto\APRJ\Services\ServiceFilter;

class PersisteLogin implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		
		$email = $_POST['email'];
		$senha = $_POST['senha'];

		$email = ServiceFilter::filtraEmail($email);

		echo $email;exit;
		$login = new ModelLogin();
		$login->inserir($senha);
	}
}