<?php

namespace Projeto\APRJ\Services;

require __DIR__ . '/../../config/config.php';

trait ServiceTraitErro
{
	public static function trataErro(\Exception $e){
		
		if(DEBUG){
			echo '<pre>';
			print_r($e);
			echo '</pre>';
			
		}else{
			echo $e->getMessage();
		}
		exit;
	}
}
