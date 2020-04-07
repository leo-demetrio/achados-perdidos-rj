<?php 

namespace Projeto\APRJ\Services;


class ServiceValidaInput
{
 	public static function validaInputTelefone($telefone)
 	{
 		if(strlen($telefone) == 15){

 			$regex_telefone = "/^\([0-9]{2}\)[0-9]{5}\-[0-9]{4}$/";
 			$validado = preg_match($regex_telefone, str_replace(" ","",$telefone));
 			return $validado;

 		}else {
 			return false;
 		}
 	}
}