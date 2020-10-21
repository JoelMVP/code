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
		$estructura = view('layout/header') . view('login') . view('layout/footer');
		return $estructura;
	}
	public function perfil()
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
			redirect('', 'refresh');
		} else {
			$estructura = view('layout/header') . view('login') . view('layout/footer');
		}
		return $estructura;
	}
	public function actualiza()
	{
		$request = \Config\Services::request();
		if ($request->getMethod() == 'post') {
			$newName = null;
			$file = $request->getFile('image');
			if ($file->isValid() && !$file->hasMoved()) {
				$newName = $file->getRandomName();
				if (!$file->move('assets/img/', $newName)) {
					echo $file->getErrorString() . ' ' . $file->getError();
				}
			}
			$id = $request->getPost('id') - 1;
			$colorS = $request->getPost('colorS');
			$fakeBD =  $this->session->get();
			$user = $fakeBD['users'][$id];
			// var_dump($user);
			if ($newName !== null) {
				$user[3] = $newName;
			} else {
				$user[3] = $this->session->get('users')[$id][3];
			}
			$user[4] = $colorS;
			if ($request->getPost('save')) {
				$fakeBD['users'][$id][3] = $user[3];
				$fakeBD['users'][$id][4] = $user[4];
				$this->session->set($fakeBD);
			}
			$estructura = view('layout/header') . view('home', $user) . view('layout/footer');
		} else {
			$estructura = view('layout/header') . view('login') . view('layout/footer');
		}
		return $estructura;
	}
	public function eliminar()
	{
		$this->session->destroy();
	}
}
