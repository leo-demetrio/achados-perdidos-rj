<?php


namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Controller\ControllerComHtml;
use Projeto\APRJ\Services\ServiceTraitErro;

class Veiculo extends ControllerComHtml implements InterfaceControladoraRequisicao
{
    use ServiceTraitErro;

    public function processaRequisicao(): void
    {
        try {
            echo $this->renderizaHtml('veiculo/veiculo.php', [
                'titulo' => 'Veiculos'
            ]);

        } catch (\Exception $e) {
            $this->trataErro($e);
        }


    }


}