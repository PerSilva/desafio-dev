<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\HTTP\Files\UploadedFile;
use RuntimeException;

class UploadController extends BaseController
{
    /**
     * Método que retorna a view com o formulário para upload do arquivo.  
     *  @return View
     */
    public function index() {
        return view('upload');
    }
}