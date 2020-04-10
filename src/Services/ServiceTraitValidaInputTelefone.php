<?php
namespace Projeto\APRJ\Services;

use Projeto\APRJ\Services\ServiceTraitRetiraFormatacao;

trait ServiceTraitValidaInputTelefone
{
	use ServiceTraitRetiraFormatacao;

	public function validaInputTelefone($telefone)
 	{
 		switch(strlen($telefone)){

 			case "14":
 			return $this->testaCeleular($telefone);
 			break;

 		}
 		
 	}
 	public function testaCeleular($telefone){

		// $regex_telefone = "/^\([0-9]{2}\)[0-9]{5}\-[0-9]{4}$/";
	 // 	$validado = preg_match($regex_telefone, str_replace(" ","",$telefone));
	 // 	return $validado;
 		return true;

	}
	public function textaResidecial(){

	}
}


// //if(strlen($telefone) == 15){

 			

//  		}elseif (strlen($telefone) == 14){
	
// 			$regex_telefone = "/^\([0-9]{2}\)[0-9]{4}\-[0-9]{4}$/";
// 			$validado  = preg_match($regex_telefone, $telefone);
// 			return $validado; 	

//  		}elseif (strlen($telefone) == 11) {
 			
//  			$regex_telefone = "/^[0-9]{2}[0-9]{5}[0-9]{4}$/";
//  			$validado = preg_match($regex_telefone, $telefone);
//  			return $validado;

//  		}else {

//  			return false;

//  		}