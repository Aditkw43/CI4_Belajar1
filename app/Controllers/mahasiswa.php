<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Mahasiswa;

class mahasiswa extends Controller
{
    public function __construct()
    {
        $this->model = new M_Mahasiswa();
    }
    public function index()
    {
        $model = new M_Mahasiswa();

        $data = [
            'judul' => 'Data Mahasiswa',
            'mahasiswa' => $model->getAllData()
        ];
        echo view('templates/v_header', $data);
        echo view('templates/v_sidebar');
        echo view('templates/v_topbar');
        echo view('mahasiswa/index', $data);
        echo view('templates/v_footer');
    }

    public function tambah()
    {
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama')
        ];

        // insert data
        $success = $this->model->tambah($data);
        if ($success) {
            return redirect()->to(base_url('mahasiswa'));
        }
    }
}
