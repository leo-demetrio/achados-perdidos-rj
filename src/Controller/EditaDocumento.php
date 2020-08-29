<?php


namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Model\ModelDocumento;
use Projeto\APRJ\Services\ServiceTraitErro;

class EditaDocumento extends ControllerComHtml implements InterfaceControladoraRequisicao
{
    use ServiceTraitErro;

    public function processaRequisicao(): void
    {
        try{

        $numero = $_GET['id_doc'];
        $tabela = "documentos";
        $documento = ModelDocumento::buscaPeloIdDoc($tabela,$numero);
        // echo("<pre>");
        // var_dump($documento);exit;

        echo $this->renderizaHtml('documento/cadastro-documento.php',[
            'titulo' => 'Edita Documento',
            'documento' => $documento
        ]);



        }catch (\Exception $e){
            $this->trataErro($e);
        }


    }

}