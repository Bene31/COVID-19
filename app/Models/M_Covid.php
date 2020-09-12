<?php
namespace App\Models;
use \CodeIgniter\Model;

class M_Covid extends Model {
	private $conexao;
	public $site;
	public $arquivo;
	public $data_criacao;

	public function __construct($conexao){
		$this->conexao = $conexao;
	}

	public function CadastrarCovid($usuario){

		$data = date('d/m/Y');
		$codigo = $this->SequencieCovid();
		$sql = "
			INSERT INTO covid (
				id,
				ds_arquivo,
				dt_criacao,
				dt_atualizacao,
				id_usuario,
				site,
				diretorio
			)
			values
			(
				'$codigo',
				'$this->arquivo',
				TO_DATE('$this->data_criacao', 'YYYY/MM/DD'),
				TO_DATE('$data', 'DD/MM/YYYY'),
				'$usuario',
				'$this->site',
				'assets/upload/'
			)
		";
		$query = oci_parse($this->conexao, $sql);
		if (oci_execute($query)) {
	        oci_commit($this->conexao);
	        return 1;
	    } else {
	        return 0;
	    }
	}

	public function ListaCovid($usuario){
		$sql = "
			SELECT 
				c.id,
				c.ds_arquivo,
				TO_CHAR(c.dt_criacao, 'DD/MM/YYYY') dt_criacao,
				TO_CHAR(c.dt_atualizacao, 'DD/MM/YYYY') dt_atualizacao,
				u.nm_usuario,
				c.site,
				c.diretorio
			FROM
			covid c
			inner join usuario u on u.id_usuario = c.id_usuario
			order by 6, extract(month from c.dt_criacao), extract(day from c.dt_criacao), 2
		";

		$stid = oci_parse($this->conexao, $sql);
	    oci_execute($stid);
	    $retorno = array();
	    $i=0;
	    while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
	    	$i++;
	        $retorno[] = array(
	        	'contador' => $i,
        		'codigo' => $row['ID'],
        		'arquivo' => $row['DS_ARQUIVO'],
        		'data_criacao' => $row['DT_CRIACAO'],
        		'data_atualizacao' => $row['DT_ATUALIZACAO'],
        		'usuario' => $row['NM_USUARIO'],
        		'site' => $row['SITE'],
        		'diretorio' => $row['DIRETORIO']
	        );
	    }

	    return $retorno;
	}
	
	public function ListaMeuCovid($usuario){
		$sql = "
			SELECT 
				c.id,
				c.ds_arquivo,
				TO_CHAR(c.dt_criacao, 'DD/MM/YYYY') dt_criacao,
				TO_CHAR(c.dt_atualizacao, 'DD/MM/YYYY') dt_atualizacao,
				u.nm_usuario,
				c.site,
				c.diretorio
			FROM
			covid c
			inner join usuario u on u.id_usuario = c.id_usuario
			where c.id_usuario = '$usuario' 
			order by 6, extract(month from c.dt_criacao), extract(day from c.dt_criacao), 2
		";

		$stid = oci_parse($this->conexao, $sql);
	    oci_execute($stid);
	    $retorno = array();
	    $i=0;
	    while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
	    	$i++;
	        $retorno[] = array(
	        	'contador' => $i,
        		'codigo' => $row['ID'],
        		'arquivo' => $row['DS_ARQUIVO'],
        		'data_criacao' => $row['DT_CRIACAO'],
        		'data_atualizacao' => $row['DT_ATUALIZACAO'],
        		'usuario' => $row['NM_USUARIO'],
        		'site' => $row['SITE'],
        		'diretorio' => $row['DIRETORIO']
	        );
	    }

	    return $retorno;
	}

	public function DeleteCovid($codigo){
		$sql = "DELETE FROM covid where id = '$codigo'";
		$query = oci_parse($this->conexao, $sql);
		if (oci_execute($query)) {
	        oci_commit($this->conexao);
	        return 1;
	    } else {
	        return 0;
	    }
	}

	public function AtualizarFonteCovid($codigo){
		$sql = "UPDATE covid SET site = '$this->site' where id = '$codigo'";
		$query = oci_parse($this->conexao, $sql);
		if (oci_execute($query)) {
	        oci_commit($this->conexao);
	        return 1;
	    } else {
	        return 0;
	    }
	}

	public function AtualizarArquivo($codigo){
		$sql = "UPDATE covid SET ds_arquivo = '$this->arquivo' where id = '$codigo'";
		$query = oci_parse($this->conexao, $sql);
		if (oci_execute($query)) {
	        oci_commit($this->conexao);
	        return 1;
	    } else {
	        return 0;
	    }
	}

	public function TotalCovidRegistrado(){
		$sql = "select count(*) TOTAL from COVID";

		$stid = oci_parse($this->conexao, $sql);
	    oci_execute($stid);
	    $retorno = array();
	    if(($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
	        $retorno = $row['TOTAL'];
	    }

	    return $retorno;

	}

	// FUNÇÕES PARA GERAR A SEQUENCIE
	private function SequencieCovid(){
		$sql = "SELECT covid_seq.nextval as codigo FROM dual";
        $stid = oci_parse($this->conexao, $sql);
        oci_execute($stid);
        if (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            return $row['CODIGO'];
        }
	}
}

?>