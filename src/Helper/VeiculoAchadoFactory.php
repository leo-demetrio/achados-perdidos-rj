<?php
namespace Projeto\APRJ\Helper;

use Projeto\APRJ\Model\ModelVeiculoAchado;

class VeiculoAchadoFactory 
{
    public function newVeic($post): ModelVeiculoAchado
    {
        $id_reg = $_SESSION['id'];


       
        $veic = new ModelVeiculoAchado(
            $id_reg,
            $post['placa'],
            $post['modelo'],
            $post['cor'],
            $post['dataRegistro'],
            $post['nomeProprietario'],
            $post['situacao']

        );

        return $veic;
    }
}