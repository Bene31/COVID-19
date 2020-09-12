<?php 
namespace App\Controllers;
use App\Models\Conexao;
use App\Models\M_Setor;
use App\Models\M_Usuario;

class Perfil extends BaseController
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
		echo view('usuario/perfil');
		echo view('include/footer');
	}

	public function acao($acoes){
		if($acoes == null || $acoes == ''){
			// CASO ESTIVER VAZIO VAI SER REDIRECIONADO PARA A PAGINA DE LISTA DE SETOR
			header("Location: ".base_url()."/usuario");
		}else{
			switch ($acoes) {
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


	private function AtualizarSenha($formulario){
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();

		$usuario = new M_Usuario($conectar);

		$usuario->senha = md5($formulario['nova_senha']);
		$codigo = base64_decode(base64_decode($formulario['codigo']));
		return $usuario->AtualizarSenha($codigo);
	}

}