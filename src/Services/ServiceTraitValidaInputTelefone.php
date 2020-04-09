<?php
namespace Projeto\APRJ\Services;

class ServiceValidaInputTelefone
{
	public static function validaInputTelefone($telefone)
 	{
 		if(strlen($telefone) == 15){

 			$regex_telefone = "/^\([0-9]{2}\)[0-9]{5}\-[0-9]{4}$/";
 			$validado = preg_match($regex_telefone, str_replace(" ","",$telefone));
 			return $validado;

 		}elseif (strlen($telefone) == 14){
	
			$regex_telefone = "/^\([0-9]{2}\)[0-9]{4}\-[0-9]{4}$/";
			$validado  = preg_match($regex_telefone, $telefone);
			return $validado; 	

 		}elseif (strlen($telefone) == 11) {
 			
 			$regex_telefone = "/^[0-9]{2}[0-9]{5}[0-9]{4}$/";
 			$validado = preg_match($regex_telefone, $telefone);
 			return $validado;

 		}else {

 			return false;

 		}
 	}
}