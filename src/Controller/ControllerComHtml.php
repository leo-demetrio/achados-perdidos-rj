<?php
namespace Projeto\APRJ\Controller;

abstract class ControllerComHtml
{
	public function renderizaHtml(String $caminhoTamplate, array $dados): String
	{
		extract($dados);
		ob_start();//aciona o buffer
		require __DIR__ . '/../../view/' . $caminhoTamplate;
		$html = ob_get_clean();//pega tudo e limpa o buffer não esquecer de dar um echo

		return $html;

	}
}