<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
</head>
<body>

<div id="container">
	<h1>Inserir usuarios</h1>
	<ul>
		<li><a href="<?php echo base_url(); ?>usuarios">usuarios</a></li>
		<li><a href="<?php echo base_url(); ?>insert-usuarios">Adicionar usuarios</a></li>
	</ul>

	<div id="body">
		<?php 
			
			// Caso a validação volte erro carrega aqui, e é exibido o erro de todos os campos
			echo validation_errors('<p>', '</p>');

			// Se der tudo certo carrega a mensagem aqui
			if ($this->session->flashdata('cadastrook')) {
				echo '<p>' . $this->session->flashdata('cadastrook') . '</p>';
			}

			echo form_open('insert_usuarios/create');
			echo form_label('Nome') . "<br>";
			// Para exibir o erro separado
			// echo form_error('nome'); 
			echo form_input(array('name' => 'nome'), set_value('nome'), 'autofocus') . "<br>";
			echo form_label('Email') . "<br>";
			echo form_input(array('name' => 'email'), set_value('email')) . "<br>";
			echo form_label('Login') . "<br>";
			echo form_input(array('name' => 'login'), set_value('login')) . "<br>";
			echo form_label('Senha') . "<br>";
			echo form_password(array('name' => 'senha'), set_value('senha')) . "<br>";
			echo form_label('Repita a Senha') . "<br>";
			echo form_password(array('name' => 'senha2'), set_value('senha2')) . "<br>";
			echo form_submit(array('name' => 'cadastrar'), 'Cadastrar') . "<br>";
			echo form_close();
		?>
	</div>
</div>

</body>
</html>