<?php 
namespace App\Controllers;

class Download extends BaseController
{
	public function index($arquivo)
	{		
		header("Location: ".base_url());
	}
	public function baixar($arquivo){
		if(isset($arquivo)){
			$diretorio = __DIR__."/../../assets/upload/";
			header( "Content-type: application/octet-stream");
			header( "Content-Disposition: attachment; filename= ".$arquivo );
			header( "Pragma: no-cache");
			header( "Expires: 0" );
			// echo $diretorio.$arquivo;
			readfile($diretorio.$arquivo);
		}else{
			// CASO NÃO SEJA PREENCHIDO NADA NA URL VAI SER REDIRECIONADO A PÁGINA INICIAL
			header("Location: ".base_url());
			// echo"Pagina Inicial";
		}
	}
}