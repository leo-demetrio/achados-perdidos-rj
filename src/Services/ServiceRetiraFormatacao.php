<?php

namespace Projeto\APRJ\Services;


class ServiceRetiraFormatacao
{
	public static function retiraFormatacao($variavel)
	{
		
 		$formatado = str_replace([" ", "-", ".", "(", ")","/"], "", $variavel);
 		return $formatado;
 	
	}
}