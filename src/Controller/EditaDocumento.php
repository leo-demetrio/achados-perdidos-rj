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
        $flag = $_GET['flag'];
         // echo $flag;exit;
        $tabela = "documentos";

        if ($_GET['flag'] === 'true') {
            $tabela = "doc_achado";
            $documento = ModelDocumento::buscaPeloIdDoc($tabela,$numero);
        } else {
            $documento = ModelDocumento::buscaPeloIdDoc($tabela,$numero);
        }
        // echo $tabela;
        //ALTERAR TABELA DOC ACHADO INSERIR CAMPO id_doc
       
        // echo("<pre>");
         //var_dump($documento);exit;

        echo $this->renderizaHtml('documento/cadastro-documento.php',[
            'titulo' => 'Edita Documento',
            'documento' => $documento,
            'tabela' => $tabela,
            'flag' => $flag
        ]);

        return;

        }catch (\Exception $e){
            $this->trataErro($e);
        }


    }

}