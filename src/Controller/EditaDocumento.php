<?php


namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Model\ModelDocumento;
use Projeto\APRJ\Model\ModelDocumentoAchado;
use Projeto\APRJ\Services\ServiceTraitErro;

class EditaDocumento extends ControllerComHtml implements InterfaceControladoraRequisicao
{
    use ServiceTraitErro;

    public function processaRequisicao(): void
    {
        try{

        $id_doc = $_GET['id_doc'];
        $flag = $_GET['flag'];
        // echo $flag . $id_doc;exit;
        $tabela = "documentos";

        if ($_GET['flag'] === 'true') {
            //echo "não";exit;
            $documento = ModelDocumentoAchado::buscaPeloIdDoc($id_doc);
            echo $this->renderizaHtml('documento/edita-documento.php',[
                'titulo' => 'Edita Documento Achado',
                'documento' => $documento,
    //            'tabela' => $tabela,
                'flag' => $flag,
                'id_doc' => $id_doc
            ]);
    
            return;
        } else {
           
            $documento = ModelDocumento::buscaPeloIdDoc($tabela,$id_doc);
            echo $this->renderizaHtml('documento/edita-documento.php',[
                'titulo' => 'Edita Documento',
                'documento' => $documento,
    //            'tabela' => $tabela,
                'flag' => $flag,
                'id_doc' => $id_doc
            ]);
    
            return;
        }
         //echo $tabela;
        //ALTERAR TABELA DOC ACHADO INSERIR CAMPO id_doc
       
        // echo("<pre>");
         //var_dump($documento);exit;

        

        }catch (\Exception $e){
            $this->trataErro($e);
        }


    }

}