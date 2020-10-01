<?php
namespace Projeto\APRJ\Helper;

use Projeto\APRJ\Model\ModelVeiculo;

class VeiculoFactory 
{
    public function newVeic($post): ModelVeiculo
    {
        $data = $_SESSION['data'];
        $id_reg = $_SESSION['id'];


       //var_dump($post);exit;
        $veic = new ModelVeiculo(
            $id_reg,
            $post['placa'],
            $post['modelo'],
            $post['cor'],
            $data,
            $post['nome-proprietario'],
            $post['situacao']

        );

        return $veic;
    }
}