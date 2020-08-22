<?php


namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelSuspeito;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitLimpaPost;
use Projeto\APRJ\Services\ServiceTraitFlashMessage;


class PersisteSuspeito extends ControllerComHtml implements InterfaceControladoraRequisicao
{
    use ServiceTraitErro;
    use ServiceTraitLimpaPost;
    use ServiceTraitFlashMessage;
    use ServiceTraitFilter;

    public function processaRequisicao(): void
    {
        try{

           // var_dump($_POST);exit;
        $post = $this->limpaPost($_POST);
        $modelo = $post['modelo'];
        $placa = $post['placa'];
        $data_registro = $_SESSION['data'];
        $ip = $_SESSION['ip'];

        $suspeito = new ModelSuspeito($placa,$modelo,$data_registro,$ip);

        $tabela = 'suspeitos';
        $result = $suspeito->buscaPelaPlaca($tabela);
        if($result){
            $this->messageDanger('dv1');
            header('Location: /veiculo');
            return;
        }

        $result = $suspeito->inserir($tabela);

        return;

        }catch(\Exception $e){
            $this->trataErro($e);
        }

    }


}