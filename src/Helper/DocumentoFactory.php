<?php


namespace Projeto\APRJ\Helper;


use Projeto\APRJ\Model\ModelDocumento;

class DocumentoFactory
{
    public function newDoc(array $post): ModelDocumento
    {

        $dataRegistro= $_SESSION['data'];
        $id_registro = $_SESSION['id'];


        $documento = new ModelDocumento(

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