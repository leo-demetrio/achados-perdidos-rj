<?php


namespace Projeto\APRJ\Controller;

//use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculoAchado;
use Projeto\APRJ\Model\ModelVeiculo;
//use Projeto\APRJ\Controller\ControllerComHtml;

class EditaVeiculo extends ControllerComHtml implements InterfaceControladoraRequisicao
{
    public function processaRequisicao(): void
    {
        $placa = $_GET['placa'];

        if($_GET['flag']){
            $veiculo = ModelVeiculoAchado::buscaPelaPlaca($placa);
            //$tabela = "veiculos_achados";
            $flag = 'false';
        }else{
            $veiculo = ModelVeiculo::buscaPelaPlaca($placa);
        }

        echo $this->renderizaHtml('veiculo/cadastra-veiculo.php',[
            'titulo' => 'Edita Veiculo',
            'veiculo' => $veiculo,
            //'tabela' => $tabela,
            'flag' =>  $flag
        ]);
    }
}