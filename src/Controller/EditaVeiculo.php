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
        $flag = $_GET['flag'];

        if($flag == 'true'){
            $veiculo = ModelVeiculoAchado::buscaPelaPlaca($placa);
        }else{
            $flag = 'false';
            $veiculo = ModelVeiculo::buscaPelaPlaca2($placa);
        }

        echo $this->renderizaHtml('veiculo/edita-veiculo.php',[
          'titulo' => 'Edita Veiculo',
          'veiculo' => $veiculo,
         'flag' =>  $flag
       ]);

    }
}