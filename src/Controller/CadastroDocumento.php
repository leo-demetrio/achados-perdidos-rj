<?php
namespace Projeto\APRJ\Controller;


use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Services\ServiceErro;

class CadastroDocumento extends ControllerComHtml implements InterfaceControladoraRequisicao
{
	public function processaRequisicao(): void
	{
		try{
			$titulo = "Cadastro Documento";

			echo $this->renderizaHtml('documento/cadastro-documento.php', [
				'titulo' => 'Cadastro Documento'
			]);

		}catch(\Exception $e){
			ServiceErro::trataErro($e);
		}
	}
}