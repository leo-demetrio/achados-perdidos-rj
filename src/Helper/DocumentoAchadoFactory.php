<?php


namespace Projeto\APRJ\Helper;


use Projeto\APRJ\Model\ModelDocumentoAchado;

class DocumentoAchadoFactory
{
    public function newDoc(array $post): ModelDocumentoAchado
    {

        $dataRegistro= $_SESSION['data'];
        $id_registro = $_SESSION['id'];

       
        $documento = new ModelDocumentoAchado(

            $id_registro,
            $post['numero'],
            $post['tipo-documento'],
            $post['data_perda'],
            $dataRegistro,
            $post['nome'],
            $post['situacao']

        );
       
        return $documento;
    }
}