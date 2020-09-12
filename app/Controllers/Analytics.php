<?php 
namespace App\Controllers;
use App\Models\Conexao;
use App\Models\M_Usuario;
use App\Models\M_Covid;
use App\Models\M_Setor;
class Analytics extends BaseController
{
	public function index()
	{
		// return view('welcome_message');
		$conexao = new Conexao();
		$conectar = $conexao->Conectar();

		$setor = new M_Setor($conectar);
		$covid = new M_Covid($conectar);
		$usuario = new M_Usuario($conectar);

		$data = array(
			'url_base' => base_url(),
			'titulo' => 'analytics'
		);
	 	echo view('include/header', $data);
        echo view('include/menu');
        
        echo view('analytics/analytics');
        echo view('include/footer');
	}

	//--------------------------------------------------------------------

}
