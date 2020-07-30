<?php

namespace Projeto\APRJ\Services;



trait ServiceTraitFlashMessage
{
	private 
	$dNeutra = "Não foi possíel cadastrar",

	//mensgens de sucesso veículo
	$msv1 = "Veículo cadastrado com sucesso",
	$msv2 = "Teste de número",

	//mensgem de danger veículo
	$mdv1 = "Você já cadastrou em nosso banco!",
	$mdv2 = "Este veículo já possui cadastro como achado no banco",
	$mdv3 = "Este veículo foi encontrado em nosso sistema seu proprietário será notificado",
	$mdv4 = "Este veículo já foi cadastrado no banco",
	$mdv5 = "O veículo se encontra em nossa base de dados iremos entrar em contato com quem está em posse dele",
	$mdv6 = 'você já cadastrou esse veículo',

	//mensagem sucesso documento
	$msd1 = "Documento cadastrado com sucesso",
	$msd2 = "Documento excluído com sucesso!!",
	
	//mensagem de danger documento
	$mdd1 = "você já cadastrou",
	$mdd2 = "você já cadstrou como achado", 
	$mdd3 = "Este documento já possui cadastro como achado no banco",
	$mdd4 = "Este documento foi encontrado em nosso sistema seu proprietário será notificado",
	$mdd5 = "Esse documento já foi cadastrado no banco",
	$mdd6 = "Documento em nossa base de dados, iremos entrar em contato com quem tem a posse do documento",
	$mdd7 = "Não foi possível excluir, tente novamente",

	//email mensagem  documento achado
	$mda = "O documento foi achado",
	$mde1 = "O email já possui cadastro!!",

	//mensagem danger cadastro principal
	$mdc1 = "Não foi possível cadastrar tente novamente",
	$mdc2 = "Cadastro efetuado com sucesso";



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

		$msg = "m".$tipo;
		// echo $this->$msg;exit;

		$_SESSION['tipo_mensagem'] = "success";
		$_SESSION['mensagem'] = $this->$msg;
		return $this->$msg;
		
	}
	public  function messageDanger($tipo){

		$msg = "m".$tipo;
		// echo $this->$msg;exit;

		$_SESSION['tipo_mensagem'] = "danger";
		$_SESSION['mensagem'] = $this->$msg;
		
	}
}

