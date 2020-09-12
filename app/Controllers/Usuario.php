<?php 
namespace App\Controllers;
use App\Models\Conexao;
use App\Models\M_Setor;
use App\Models\M_Usuario;

class Usuario extends BaseController
{
	public function index()
	{
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();

		$setor = new M_Setor($conectar);
		$usuario = new M_Usuario($conectar);

		$data = array(
			'url_base' => base_url(),
			'lista_setor' => $setor->ListaSetor(),
			'listar_usuario' => $usuario->ListaUsuario()
		);

		echo view('include/header', $data);
		echo view('include/menu');
		echo view('usuario/usuario');
		echo view('include/footer');
	}

	public function acao($acoes){
		if($acoes == null || $acoes == ''){
			// CASO ESTIVER VAZIO VAI SER REDIRECIONADO PARA A PAGINA DE LISTA DE SETOR
			header("Location: ".base_url()."/usuario");
		}else{
			switch ($acoes) {
				// AÇÃO PARA QUANDO FOR CADASTRO
				case 'cadastra-usuario':					
					$cadastro = $this->CadastrarUsuario($_POST);
					echo json_encode($cadastro);
					
				break;
				
				/*case 'remove-usuario':
					$deleta = $this->ExcluirUsuario($_POST);
					echo json_encode($deleta);
				break;*/
				
				case 'atualizar-usuario':
					$atualiza = $this->AtualizarUsuario($_POST);
					echo json_encode($atualiza);
				break;

				case 'resetar-senha-usuario':
					$nova_senha = $this->AtualizarSenha($_POST);
					echo json_encode($nova_senha);
				break;
				
				default:
					# code...
				break;
			}
		}
	}


	private function CadastrarUsuario($formulario){

		$conexao = new Conexao();
		$conectar = $conexao->Conectar();

		$usuario = new M_Usuario($conectar);

		$usuario->matricula = $formulario['matricula'];
		$usuario->nome = $formulario['nm_nome'];
		$usuario->cpf = $formulario['cpf'];
		$usuario->data_nascimento = $formulario['dt_nascimento'];
		$usuario->email = $formulario['email'];
		$usuario->telefone = $formulario['celular'];
		$usuario->endereco = $formulario['endereco'];
		$usuario->setor = $formulario['ds_setor'];
		$usuario->senha = md5($formulario['senha']);

		return $usuario->CadastraUsuario();
	}

	/*private function ExcluirUsuario($formulario){
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();
		
		$codigo = base64_decode(base64_decode($formulario['codigo']));

		$usuario = new M_Usuario($conectar);
		return $usuario->ExcluirUsuario($codigo);
	}*/

	private function AtualizarUsuario($formulario){
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();

		$usuario = new M_Usuario($conectar);

		$usuario->nome = $formulario['nm_nome'];
		$usuario->cpf = $formulario['cpf'];
		$usuario->data_nascimento = $formulario['dt_nascimento'];
		$usuario->email = $formulario['email'];
		$usuario->telefone = $formulario['celular'];
		$usuario->endereco = $formulario['endereco'];
		$usuario->setor = $formulario['ds_setor'];
		$usuario->ativo = $formulario['ativo'];
		$codigo = base64_decode(base64_decode($formulario['codigo']));
		return $usuario->AtualizarUsuario($codigo);
	}

	private function AtualizarSenha($formulario){
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();

		$usuario = new M_Usuario($conectar);

		$usuario->senha = md5($formulario['nova_senha']);
		$codigo = base64_decode(base64_decode($formulario['codigo']));
		return $usuario->AtualizarSenha($codigo);
	}

}