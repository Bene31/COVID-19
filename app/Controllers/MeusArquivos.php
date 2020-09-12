<?php 
namespace App\Controllers;
use App\Models\Conexao;
use App\Models\M_Covid;

class MeusArquivos extends BaseController
{
	public function index()
	{
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();

		$covid = new M_Covid($conectar);

		$data = array(
			'url_base' => base_url(),
			'lista_covid' => $covid->ListaMeuCovid($_SESSION['usuario_covid_logado']['codigo'])
		);

		echo view('include/header', $data);
		echo view('include/menu');
		echo view('covid/meusarquivos');
		echo view('include/footer');
	}

	public function acao($acoes){
		if($acoes == null || $acoes == ''){
			// CASO ESTIVER VAZIO VAI SER REDIRECIONADO PARA A PAGINA DE LISTA DE SETOR
			header("Location: ".base_url()."/usuario");
		}else{
			switch ($acoes) {
				// AÇÃO PARA QUANDO FOR CADASTRO
				case 'adicionar-covid':					
					$cadastrar = $this->CadastraCovid($_POST, $_FILES["arquivo"]);
					echo json_encode($cadastrar);
				break;

				case 'remove-covid':
					$excluir = $this->ExcluirCOVID($_POST);
					echo json_encode($excluir);
				break;

				case 'atualizar-site-covid':
					$atualiza_fonte = $this->AtualizarFonte($_POST);
					echo json_encode($atualiza_fonte);
					
				break;

				case 'atualizar-arquivo-covid':
					$atualizando_arquivo = $this->AtualizaArquivo($_POST, $_FILES["arquivo"]);
					echo json_encode($atualizando_arquivo);
					// echo"<pre>";
					// print_r($_POST);
					// echo"</pre>";
					// echo"<pre>";
					// print_r($_FILES["arquivo"]);
					// echo"</pre>";
				break;
				
				default:
					# code...
				break;
			}
		}
	}


	private function CadastraCovid($formulario, $arquivo){
		// if(isset($arquivo)){

            $diretorio = __DIR__."/../../assets/upload/";
            /*   PREPARANDO DADOS PARA FAZER UPLOAD DO ARQUIVO   */
            //$target_file = $target_dir . basename($_FILES["file"]["name"]);
            
            $nomeArquivo = $arquivo["name"];
            $tamanhoArquivo = $arquivo["size"];
            $nomeTemporario = $arquivo["tmp_name"];
            
            //$ext = pathinfo($nomeArquivo, PATHINFO_EXTENSION);
            //$nomeArquivo = md5(date('d/m/y H:i:s')) .".". $ext;

            // CARREGANDO O ARQUIVO E MOVENDO PARA DIRETORIO DE DESTINO
            if(move_uploaded_file($arquivo["tmp_name"], $diretorio . $nomeArquivo)){
                
                $conexao = new Conexao();
				$conectar = $conexao->Conectar();

                $covid = new M_Covid($conectar);
				$covid->data_criacao = $formulario['dt_criacao'];
                $covid->site = $formulario['fonte'];
				$covid->arquivo = $nomeArquivo;
                return $covid->CadastrarCovid($_SESSION['usuario_covid_logado']['codigo']);
                
            }else{
            	return 2;
            }
	}

	private function ExcluirCOVID($formulario){

		$conexao = new Conexao();
		$conectar = $conexao->Conectar();
		
		$codigo = base64_decode(base64_decode($formulario['codigo']));

		$covid = new M_Covid($conectar);
		$exclui_covid = $covid->DeleteCovid($codigo);
		if($exclui_covid == 1){
		 	$diretorio = __DIR__."/../../assets/upload/";
			unlink($diretorio.$formulario['ds_arquivo']);
			return 1;
		}else{
			return 0;
		}
	}

	private function AtualizarFonte($formulario){
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();
		
		$codigo = base64_decode(base64_decode($formulario['codigo']));
		$site = $formulario['site'];

		$covid = new M_Covid($conectar);
		$covid->site = $site;
		return $covid->AtualizarFonteCovid($codigo);
	}

	private function AtualizaArquivo($formulario, $arquivo){
		$diretorio = __DIR__."/../../assets/upload/";
        /*   PREPARANDO DADOS PARA FAZER UPLOAD DO ARQUIVO   */
        //$target_file = $target_dir . basename($_FILES["file"]["name"]);
        
        $nomeArquivo = $arquivo["name"];
        $tamanhoArquivo = $arquivo["size"];
        $nomeTemporario = $arquivo["tmp_name"];
        
        //$ext = pathinfo($nomeArquivo, PATHINFO_EXTENSION);
        //$nomeArquivo = md5(date('d/m/y H:i:s')) .".". $ext;
		
        // CARREGANDO O ARQUIVO E MOVENDO PARA DIRETORIO DE DESTINO
        if(move_uploaded_file($arquivo["tmp_name"], $diretorio . $nomeArquivo)){
            // $codigo_produto = $_SESSION['codigo_produto'];
            $conexao = new Conexao();
			$conectar = $conexao->Conectar();
	        
	        $codigo = base64_decode(base64_decode($formulario['codigo']));

            $covid = new M_Covid($conectar);
			$covid->arquivo = $nomeArquivo;
            $atualizando_banco = $covid->AtualizarArquivo($codigo);

            if($atualizando_banco == 1){
				unlink($diretorio.$formulario['arquivo_antigo']);
				return 1;
            }else{
            	return 0;
            }
            
        }else{
        	return 2;
        }
	}
}