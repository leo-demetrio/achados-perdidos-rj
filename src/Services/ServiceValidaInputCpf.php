<?php 

namespace Projeto\APRJ\Services;

use Projeto\APRJ\Services\ServiceRetiraFormatacao;


class ServiceValidaInput
{
 	
 	public static function validaInputCpf($cpf){

 		//$cpf_regex = $this->regexCpf($cpf_formatado);
 		$cpf_formatado = ServiceRetiraFormatacoa::retiraFormatacao($cpf);
 		if(!$this->verificaIguais($cpf_formatado)) return false;
 		if(!$this->validarDigitosCpf($cpf)) return false;
 		return $cpf_formatado;

 	}
 	// private function removeFormatacao($variavel){
 	// 	$somente_numeros = str_replace([" ", "-", ".", "(", ")"], "", $variavel);
 	// 	return $somente_numeros;
 	// }
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