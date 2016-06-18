<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
*  Posso fazer tanto com esse jeito do proprio CI como também com pdo
*/
class Crud_model extends CI_Model
{

	public function do_insert( $dados = NULL ){
		if ( $dados != NULL ) :
			$this->db->insert('usuario', $dados);
			$this->session->set_flashdata('cadastrook', 'Cadastrado com sucesso');
			redirect('insert_usuarios/create');
		endif;
	}

	function get_byid($id = NULL){
		if ($id != NULL) :
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('usuario');
		else:
			return FALSE;
		endif;
	}

	public function do_update( $dados = NULL, $condicao = NULL ){
		if ( $dados != NULL && $condicao != NULL ) :
			$this->db->update('usuario', $dados, $condicao);
			$this->session->set_flashdata('edicaook', 'Registro alterado com sucesso');
			redirect(current_url());
		endif;
	}

	public function do_delete( $condicao = NULL ){
		if ( $condicao != NULL ) :
			$this->db->delete('usuario', $condicao);
			$this->session->set_flashdata('excluirok', 'Registro excluido com sucesso');
			redirect('crud/retrieve');
		endif;
	}

	public function get_all(){
		return $this->db->get('usuario');
	}

}