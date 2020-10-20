<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
	protected $session = null;
	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
		$this->session = \Config\Services::session();
		$newData = [
			'users' => array(
				// id    clave  login     imagen  color      nombreC          fechaNac  LugarR
				[1, 5208, 3751440, 'img.jpg', 1, 'AURORA BRU TORRES', "1980-02-20", 01],
				[2, 5287, 16374766, 'img.jpg', 1, 'MARIA ROSARIO CORRAL SOLER', '1994-08-11', 04],
				[3, 8289, 28340389, 'img.jpg', 1, 'ANTONIO PORTILLA TORRECILLA', '1992-04-02', 04],
				[4, 6007, 41079811, 'img.jpg', 1, 'JORGE IZAGUIRRE MELLADO', '1996-10-06', 02],
				[5, 222, 111, 'img.jpg', 1, 'JOEL MENDOZA PAUCARA', "1997-01-15", 01],
			),
			'login' => false
		];
		$this->session->set($newData);
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}
}
