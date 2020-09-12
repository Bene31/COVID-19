<?php
namespace App\Models;
use \CodeIgniter\Model;

class M_Usuario extends Model {
	private $conexao;

	public $matricula;
	public $nome;
	public $cpf;
	public $data_nascimento;
	public $email;
	public $telefone;
	public $endereco;
	public $setor;
	public $senha;
	public $ativo;

	public function __construct($conexao){
		$this->conexao = $conexao;
	}


	public function CadastraUsuario(){
		$codigo = $this->SequencieUsuario();
		$sql = "
			INSERT INTO usuario 
			(
				id_usuario, 
				cd_matricula, 
				nm_usuario,
				cpf_usuario,
				dt_nascimento,
				email_usuario,
				cel_usuario,
				endereco_usuario,
				id_setor,
				psw_usuario
			)
			values
			(
				'$codigo',
				'$this->matricula',
				'$this->nome',
				'$this->cpf',
				TO_DATE('$this->data_nascimento', 'YYYY/MM/DD'),
				'$this->email',
				'$this->telefone',
				'$this->endereco',
				'$this->setor',
				'$this->senha'
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

	public function ListaUsuario(){
		$sql = "
			select 
				u.id_usuario,
				u.cd_matricula,
				u.nm_usuario,
				u.cpf_usuario,
				TO_CHAR(u.dt_nascimento, 'DD/MM/YYYY') dt_nascimento,
				u.dt_nascimento,
				u.email_usuario,
				u.cel_usuario,
				u.endereco_usuario,
				u.id_setor,
				u.ativo,
				s.nm_setor
			from usuario u
			left join setor s on s.id_setor = u.id_setor
			order by 2
		";
		$stid = oci_parse($this->conexao, $sql);
	    oci_execute($stid);
	    $retorno = array();
	    $i=0;
	    while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
	    	$i++;
	        $retorno[] = array(
	        	'contador' => $i,
        		'codigo' => $row['ID_USUARIO'],
        		'matricula' => $row['CD_MATRICULA'],
        		'nome' => $row['NM_USUARIO'],
        		'cpf' => $row['CPF_USUARIO'],
        		'data_nascimento' => $row['DT_NASCIMENTO'],
        		'email' => $row['EMAIL_USUARIO'],
        		'celular' => $row['CEL_USUARIO'],
        		'endereco' => $row['ENDERECO_USUARIO'],
        		'codigo_setor' => $row['ID_SETOR'],
				'ativo' => $row['ATIVO'],
        		'setor' => $row['NM_SETOR']
	        );
	    }
	    return $retorno;
	}	

	/*public function ExcluirUsuario($codigo){
		$sql = "DELETE FROM usuario where id_usuario = '$codigo'";
		$query = oci_parse($this->conexao, $sql);
		if (oci_execute($query)) {
	        oci_commit($this->conexao);
	        return 1;
	    } else {
	        return 0;
	    }
	}*/

	public function AtualizarUsuario($codigo){
		$sql = "
			UPDATE usuario SET
			nm_usuario= '$this->nome',
			cpf_usuario= '$this->cpf',
			dt_nascimento= TO_DATE('$this->data_nascimento', 'YYYY/MM/DD'),
			email_usuario= '$this->email',
			cel_usuario= '$this->telefone',
			endereco_usuario= '$this->endereco',
			id_setor= '$this->setor',
			ativo= '$this->ativo'
			where
			id_usuario = '$codigo' 
		";
		$query = oci_parse($this->conexao, $sql);
		if (oci_execute($query)) {
	        oci_commit($this->conexao);
	        return 1;
	    } else {
	        return 0;
	    }
	}

	public function AtualizarSenha($codigo){
		$sql = "
			UPDATE usuario SET
			psw_usuario = '$this->senha'
			where
			id_usuario = '$codigo' 
			and ativo = 'S'
		";
		$query = oci_parse($this->conexao, $sql);
		if (oci_execute($query)) {
	        oci_commit($this->conexao);
	        return 1;
	    } else {
	        return 0;
	    }
	}

	public function AcessarSistema($login, $senha){
		$sql = "
		SELECT 
			u.id_usuario,
			u.cd_matricula,
			u.nm_usuario,
			u.cpf_usuario,
			u.dt_nascimento,
			u.email_usuario,
			u.cel_usuario,
			u.endereco_usuario,
			s.nm_setor,
			u.ativo
		FROM
			usuario u
		INNER JOIN setor s on s.id_setor = u.id_setor
		where u.cd_matricula = '$login' AND u.psw_usuario = '$senha' and ativo='S'
		";
		$stid = oci_parse($this->conexao, $sql);
	    oci_execute($stid);
	    $retorno = 0;
	    $i=0;
	    while (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
	    	$i++;
	        $retorno = array(
	        	'contador' => $i,
        		'codigo' => $row['ID_USUARIO'],
        		'matricula' => $row['CD_MATRICULA'],
        		'nome' => $row['NM_USUARIO'],
        		'cpf' => $row['CPF_USUARIO'],
        		'data_nascimento' => $row['DT_NASCIMENTO'],
        		'email' => $row['EMAIL_USUARIO'],
        		'celular' => $row['CEL_USUARIO'],
        		'endereco' => $row['ENDERECO_USUARIO'],
        		'setor' => $row['NM_SETOR'],
				'ativo' => $row['ATIVO']
	        );
	    }
	    return $retorno;
	}

	public function TotalUsuarioRegistrado(){
		$sql = "select count(*) TOTAL from usuario";

		$stid = oci_parse($this->conexao, $sql);
	    oci_execute($stid);
	    $retorno = array();
	    if(($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
	        $retorno = $row['TOTAL'];
	    }

	    return $retorno;

	}
	
	// FUNÇÕES PARA GERAR A SEQUENCIE
	private function SequencieUsuario(){
		$sql = "SELECT usuario_seq.nextval as codigo FROM dual";
        $stid = oci_parse($this->conexao, $sql);
        oci_execute($stid);
        if (($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) != false) {
            return $row['CODIGO'];
        }
	}
}