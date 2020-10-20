<?php

namespace App\Controllers;

class Inicio extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        $estructura = view('layout/header') . view('index') . view('layout/footer');
        return $estructura;
    }
}
