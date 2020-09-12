<?php
namespace App\Models;
use \CodeIgniter\Model;

class M_Setor extends Model {
	private $conexao;
	public $ds_setor;

	public function __construct($conexao){
		$this->conexao = $conexao;
	}

	public function CadastraSetor(){
		$codigo = $this->SequencieSetor();
		$sql = "INSERT INTO setor (id_setor, nm_setor) values ($codigo, '$this->ds_setor')";
		$query = oci_parse($this->conexao, $sql);
		if (oci_execute($query)) {
	        oci_commit($this->conexao);
	        return 1;
	    } else {
	        return 0;
	    }
	}

	public function ListaSetor(){
		$sql = "
			SELECT id_setor CODIGO, nm_setor SETOR from setor order by 2
		";
		$stid = oci_parse($this->conexao, $sql);
	    oci_execute($stid);
	    $returno = array();
	    $i=0;
	    while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
	    	$i++;
	        $retorno[] = array(
	        	'contador' => $i,
        		'codigo' => $row['CODIGO'],
        		'setor' => $row['SETOR']
	        );
	    }

	    return $retorno;
	}

	public function ExcluirSetor($codigo){
		$sql = "DELETE FROM setor where id_setor = '$codigo'";
		$query = oci_parse($this->conexao, $sql);
		if (oci_execute($query)) {
	        oci_commit($this->conexao);
	        return 1;
	    } else {
	        return 0;
	    }
	}

	public function AtualizaSetor($codigo){
		$sql = "UPDATE setor SET nm_setor = '$this->ds_setor' where id_setor = '$codigo'";
		$query = oci_parse($this->conexao, $sql);
		if (oci_execute($query)) {
	        oci_commit($this->conexao);
	        return 1;
	    } else {
	        return 0;
	    }
	}

	public function TotalSetorRegistrado(){
		$sql = "select count(*) TOTAL from setor";

		$stid = oci_parse($this->conexao, $sql);
	    oci_execute($stid);
	    $retorno = array();
	    if(($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
	        $retorno = $row['TOTAL'];
	    }

	    return $retorno;

	}

	// FUNÇÕES PARA GERAR A SEQUENCIE
	private function SequencieSetor(){
		$sql = "SELECT setor_seq.nextval as codigo FROM dual";
        $stid = oci_parse($this->conexao, $sql);
        oci_execute($stid);
        if (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            return $row['CODIGO'];
        }
	}

}