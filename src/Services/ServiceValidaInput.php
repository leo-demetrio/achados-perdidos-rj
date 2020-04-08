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
 	public static function validaInputCpf($cpf){

 		//$cpf_regex = $this->regexCpf($cpf_formatado);
 		$cpf_formatado = $this->removeFormatacao($cpf);
 		if(!$this->verificaIguais($cpf_formatado)) return false;
 		if(!$this->validarDigitosCpf($cpf)) return false;
 		return $cpf_formatado;

 	}
 	private function removeFormatacao($variavel){
 		$somente_numeros = str_replace([" ", "-", ".", "(", ")"], "", $variavel);
 		return $somente_numeros;
 	}
 	private function verificaIguais($variavel){

 		for($i = 0; $i<= 11; $i++){
 			if(str_repeat($i, 11) == $variavel) return false;
 		}
 	}
 	private function regexCpf($variavel){

 		$regex_cpf = "/^[0-9]{3}\.[0-9][{3}\.[0-9]\-[0-9]{2}$/";
 		return preg_match($regex_cpf, $cpf);

 	}
 	private function validarDigitosCpf($cpf){

 		for($i = 0, $peso = 10; $i <= 8; $i++, $peso--){
 			$primeiro_digito += $cpf[$i] * $peso;
 		}
 		for($i = 0, $peso = 11; $i <= 8; $i++, $peso--){
 			$segundo_digito += $cpf[$i] * $peso;
 		}
 		$calculo_um = (($primeiro_digito % 11) < 2)? 0 : 11 - ($primeiro_digito % 11); 
 		$calculo_dois = (($segundo_digito % 11) < 2)? 0 : 11 - ($segundo_digito % 11); 

 		if($calculo_um <> $cpf[9] || $calculo_dois <> $cpf[10]) return false;
 	}
}