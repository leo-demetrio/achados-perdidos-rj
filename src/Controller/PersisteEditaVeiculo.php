<?php

namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelVeiculo;
use Projeto\APRJ\Helper\VeiculoFactory;
use Projeto\APRJ\Helper\VeiculoAchadoFactory;
use Projeto\APRJ\Model\ModelVeiculoAchado;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitValidaData;
use Projeto\APRJ\Services\ServiceTraitLimpaPost;
use Projeto\APRJ\Services\ServiceTraitFlashMessage;

class PersisteEditaVeiculo implements InterfaceControladoraRequisicao
{
    use ServiceTraitErro;
    use ServiceTraitLimpaPost;
    use ServiceTraitFlashMessage;

    public function processaRequisicao(): void
    {
        try{

            $post = $this->limpaPost($_POST);
            //var_dump($post);exit;

            //veiculo achado
            if($post['flag'] == 'true') {
               
                if(!($post['situacao'] == 'achado')) {
                   
                    $veic = new VeiculoFactory();
                    $veic = $veic->newVeic($post);
                    $veic->inserirNovo();                    
                    ModelVeiculoAchado::excluir($post['placa']);
                    header('location: /relatorio');
                    return;
                  
                }
                
                $veic = new VeiculoAchadoFactory();
                $veic = $veic->newVeic($post);               
                $veic->editar();
                header('location: /relatorio');
                return;
            }

            //veiculo perdido roubado furtado
            if ($post['situacao'] == 'achado') {
                $veic = new VeiculoAchadoFactory();
                $veic = $veic->newVeic($post);               
                $veic->inserir();
                ModelVeiculo::excluir($post['placa']);
                header('location: /relatorio');
                return;
            }
            $veic = new VeiculoFactory();
            $veic = $veic->newVeic($post);
            $veic->editar();
            header('location: /relatorio');
            return;
            


        } catch (\Exception $e) {
            $this->trataErro($e);
        }
    }
}