<?php

namespace Projeto\APRJ\Services;



trait ServiceTraitFlashMessage
{
	private 
	$dNeutra = "Não foi possíel cadastrar",

	$msv1 = "Teste de mensagem danger",
	$msv2 = "Teste de número",

	$mdv1 = "Você já cadastrou em nosso banco!",
	$mdv2 = "Este veículo já possui cadastro como achado no banco",
	$mdv3 = "Este veículo foi encontrado em nosso sistema seu proprietário será notificado",
	$mdv4 = "Este veículo já foi cadastrado no banco",
	$mdv5 = "O veículo se encontra em nossa base de dados iremos entrar em contato com quem está em posse dele";


	//****** Implemtar msg de sucesso ou não
	// public function message($success = null, $danger = null){

	// 	echo "message";exit;
	// 	if($danger){
	// 		$m = $this->messageDanger($danger);
	// 		echo $m;exit;
	// 		return;
	// 	}	
	// 	$m = $this->messageSuccess($success);
	// 	echo $m;exit;

	// }

	public  function messageSuccess($tipo){

		$msg = "ms".$numero;
		// echo $this->$msg;exit;

		$_SESSION['tipo-mensagem'] = "success";
		$_SESSION['mensagem'] = $this->$msg;
		
	}
	public  function messageDanger($tipo){

		$msg = "m".$tipo;
		echo $this->$msg;exit;

		$_SESSION['tipo-mensagem'] = "danger";
		$_SESSION['mensagem'] = $this->$msg;
		
	}
}
