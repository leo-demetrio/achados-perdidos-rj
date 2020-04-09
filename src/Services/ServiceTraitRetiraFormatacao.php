<?php

namespace Projeto\APRJ\Services;


trait ServiceTraitRetiraFormatacao
{
	public static function retiraFormatacao($variavel)
	{
		
 		$formatado = str_replace([" ", "-", ".", "(", ")","/"], "", $variavel);
 		return $formatado;
 	
	}
}