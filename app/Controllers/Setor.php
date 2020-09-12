<?php 
namespace App\Controllers;
use App\Models\Conexao;
use App\Models\M_Setor;

class Setor extends BaseController
{
	public function index()
	{
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();

		$setor = new M_Setor($conectar);

		$data = array(
			'url_base' => base_url(),
			'lista_setor' => $setor->ListaSetor()
		);

		echo view('include/header', $data);
		echo view('include/menu');
		echo view('setor/setor');
		echo view('include/footer');
	}

	// CONTROLER RESPONSAVEL POR CONYTROLAR AS AÇÕES DE CRUD DO SETOR
	public function acao($acoes){
		if($acoes == null || $acoes == ''){
			// CASO ESTIVER VAZIO VAI SER REDIRECIONADO PARA A PAGINA DE LISTA DE SETOR
			header("Location: ".base_url()."/setor");
		}else{
			switch ($acoes) {
				// AÇÃO PARA QUANDO FOR CADASTRO
				case 'cadastra-setor':					
					$cadastro = $this->CadastraSetor($_POST);
					echo json_encode($cadastro);
				break;
				
				case 'remove-setor':
					$deleta = $this->ExcluirSetor($_POST);
					echo json_encode($deleta);
				break;

				case 'atualiza-setor':
					$atualiza = $this->AtualizarSetor($_POST);
					echo json_encode($atualiza);
				break;

				default:
					# code...
				break;
			}
		}
	}

	public function Teste(){
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();
	}

	// FUNÇÕES PRIVADAS PARA O CRUD
	private function CadastraSetor($formulario){
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();
		// $conectar = 231;
		$setor = new M_Setor($conectar);
		$setor->ds_setor = $formulario['ds_setor'];
		return $setor->CadastraSetor();
	}

	private function ExcluirSetor($formulario){
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();
		
		$codigo = base64_decode(base64_decode($formulario['codigo']));

		$setor = new M_Setor($conectar);
		return $setor->ExcluirSetor($codigo);
	}

	private function AtualizarSetor($formulario){
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();
		
		$codigo = base64_decode(base64_decode($formulario['codigo']));

		$setor = new M_Setor($conectar);
		$setor->ds_setor = $formulario['ds_setor'];

		return $setor->AtualizaSetor($codigo);
	}

}
