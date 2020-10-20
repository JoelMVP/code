<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
	{
		helper('form');
	}
	public function index()
	{
		// echo count($this->session->get());
		// var_dump($this->session->get());
		// $data = $this->session->get();
		// $data = ['name' => 'joelmendozawwww', 'aaaaasss' => "hola"];
		// $this->session->set($data);
		// echo '<br />';
		// echo '<br />';
		// echo $this->session->get('users')[1][0];
		// echo '<br /> Users:' . $this->session->get('login');
		// var_dump($this->session->get());
		$estructura = view('layout/header') . view('login') . view('layout/footer');
		return $estructura;
	}
	public function guarda()
	{
		$request = \Config\Services::request();
		$userPost = array(
			'usuario' => $request->getPost('usuario'),
			'password' => $request->getPost('password'),
		);
		$validate = null;
		foreach ($this->session->get('users') as $user) {
			if ($user[2] == $userPost['usuario'] && $user[1] == $userPost['password']) {
				$validate = $user;
			}
		};
		if ($validate) {
			$estructura = view('layout/header') . view('home', $validate) . view('layout/footer');
			echo 'Usuario encontrado';
		} else {
			$estructura = view('layout/header') . view('login') . view('layout/footer');
			echo 'Usuario no encontrado';
		}
		return $estructura;
	}
	public function Eliminar()
	{
		$this->session->destroy();
	}
}
