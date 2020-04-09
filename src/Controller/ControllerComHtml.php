<?php
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Services\ServiceTraitErro;


abstract class ControllerComHtml
{
	use ServiceTraitErro;
	
	public function renderizaHtml(String $caminhoTamplate, array $dados): String
	{
		try{
			extract($dados);
			ob_start();//aciona o buffer
			require __DIR__ . '/../../view/' . $caminhoTamplate;
			$html = ob_get_clean();//pega tudo e limpa o buffer não esquecer de dar um echo
		}catch(\Exception $e){
			$this->trataErro($e);
		}

		return $html;

	}
}