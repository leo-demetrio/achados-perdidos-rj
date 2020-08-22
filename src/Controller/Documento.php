<?php


namespace Projeto\APRJ\Controller;
use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Services\ServiceTraitErro;


class Documento extends ControllerComHtml implements InterfaceControladoraRequisicao
{
    use ServiceTraitErro;

    public function processaRequisicao(): void
    {
        try{
            echo $this->renderizaHtml('documento/documento.php',[
                'titulo' => 'Documentos'
            ]);

        }catch (\Exception $e){
            $this->trataErro($e);
        }

    }

}