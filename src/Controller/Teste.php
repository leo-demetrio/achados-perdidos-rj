<?php 

namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Suport\Email;
use Projeto\APRJ\Services\ServiceTraitErro;


class Teste
{
	use ServiceTraitErro;

	public function processaRequisicao(){
	$email = new Email();

	$email->addMensagem(

		"Mensagem de email",
		"Menasgem que vai no corpo",
		"Leopoldo",
		"leocdemetrio@gmail.com"

	)->sendEmail();
	// echo "<pre>";
	// var_dump($email);
	}



}