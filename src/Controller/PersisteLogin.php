<?php

namespace Projeto\APRJ\Controller;


use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelLogin;
use Projeto\APRJ\Services\ServiceFilter;
use Projeto\APRJ\Services\ServiceErro;

class PersisteLogin implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		try{
			$email = $_POST['email'];
			$senha = $_POST['senha'];
		}catch(\Exception $e){
			ServiceErro::trataErro($e);
		}

		//$email = ServiceFilter::filtraEmail($email);

		//echo $email;exit;
		//$login = new ModelLogin();
		//$login->inserir($senha);
	}
}