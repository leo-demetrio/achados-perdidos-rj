<?php


namespace Projeto\APRJ\Controller;


use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitValidaData;
use Projeto\APRJ\Services\ServiceTraitLimpaPost;
use Projeto\APRJ\Services\ServiceTraitFlashMessage;
use Projeto\APRJ\Model\ModelDocumento;
use Projeto\APRJ\Suport\Email;
use Projeto\APRJ\Helper\DocumentoAchadoFactory;
use Projeto\APRJ\Helper\DocumentoFactory;

class PersisteEditaDocumento  implements InterfaceControladoraRequisicao
{
    use ServiceTraitErro;
    use ServiceTraitFlashMessage;
    use ServiceTraitLimpaPost;



    public function processaRequisicao(): void
    {
        try {

            $post = $this->limpaPost($_POST);
           

            if($_POST['flag'] == 'true'){
               
                $doc = new DocumentoAchadoFactory();                
                $doc = $doc->newDoc($post);       
                $doc->edita($post['id_doc']);
                header('location: /relatorio');
                return;

            }
            
            $doc = new DocumentoFactory();
            $doc = $doc->newDoc($post);
            $doc->edita($post['id_doc']);
            header('location: /relatorio');
            return;

        } catch (\Exception $e) {
            $this->trataErro($e);
        }
    }



}