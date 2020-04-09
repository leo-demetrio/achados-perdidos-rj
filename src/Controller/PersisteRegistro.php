$this-><?php 
namespace Projeto\APRJ\Controller;

use Projeto\APRJ\Controller\InterfaceControladoraRequisicao;
use Projeto\APRJ\Model\ModelRegistro;
use Projeto\APRJ\Services\ServiceTraitFilter;
use Projeto\APRJ\Services\ServiceTraitErro;
use Projeto\APRJ\Services\ServiceTraitEncripta;

class PersisteRegistro implements InterfaceControladoraRequisicao
{
	use ServiceTraitErro;
	use ServiceTraitFilter;
	use ServiceTraitEncripta;

	public function processaRequisicao(): void
	{
		
		try{
			//Inserção tabela Registro

			$email = $this->filtraEmail($_POST['email']);
		    $senha = $this->filtraString($_POST['senha']);
		    $ip = $_SESSION['ip'];
		    $data = $_SESSION['data'];

		    $senhaEncriptada = $this->encriptaSenha($senha);
	
			$registro = new ModelRegistro();
			$registro->inserir($email, $senhaEncriptada, $ip, $data);
			
			$id = $registro->buscaIdPorEmail($email);
			$_SESSION['id'] = $id['id_registro'];
			$_SESSION['email'] = $email;

			header("Location: /cadastro-principal");
			die();

		}catch(\Exception $e){
			$this->trataErro($e);
		}

	}
}
