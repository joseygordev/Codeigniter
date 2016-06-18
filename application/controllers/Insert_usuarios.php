<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert_usuarios extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		// Carrega o helper que manda o array para o crud_model
		$this->load->helper('array');

		// Instancia do model e posso dar um apelido pro meu model no segundo parametro
        $this->load->model('crud_model');

		// Carregaria a biblioteca que guarda sessão e quando carregada tem que ter um key  no config.php encryption_key
		//$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('insert_usuarios');
	}

	public function create(){

		// validação do formulários
		$this->form_validation->set_rules('nome', 'Preencha o campo nome', 'trim|required|max_length[50]|ucwords');
		$this->form_validation->set_rules('email', 'Preencha o campo email', 'trim|required|max_length[50]|strtolower|valid_email|is_unique[usuario.email]');
		$this->form_validation->set_rules('login', 'Preencha o campo login', 'trim|required|max_length[20]|strtolower|is_unique[usuario.login]');
		$this->form_validation->set_rules('senha', 'Preencha o campo senha', 'trim|required|max_length[32]|strtolower');
		$this->form_validation->set_message('matches', "O campo %s está diferente do campo %s");
		$this->form_validation->set_rules('senha2', 'Repita o campo repita a senha', 'trim|required|max_length[32]|strtolower|matches[senha]');

		if ($this->form_validation->run() == TRUE)
        {
            $dados = elements(array('nome', 'email', 'login', 'senha'), $this->input->post());
            $dados['senha'] = md5($dados['senha']);
            $this->crud_model->do_insert($dados);
        }

        $this->load->view('insert_usuarios');

	}
}
