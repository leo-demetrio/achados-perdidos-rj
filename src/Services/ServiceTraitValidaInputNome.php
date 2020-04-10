<?php


namespace Projeto\APRJ\Services;

trait ServiceTraitValidaInputNome
{
	public function validaInputNome($nome){
		echo $nome;
		$regex = "/^[a-z]{0,}$/";
		//$regex = "/^[a-zA-Z\u00C0-\u017F´]+\s+[a-zA-Z\u00C0-\u017F´]{1,}$/";
		return preg_match($regex, $nome);
	}
}