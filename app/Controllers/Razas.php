<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EspecieModel;
use App\Models\RazaModel;


class Razas extends BaseController
{
    protected $razas, $especie, $mascotas,$session;

    public function __construct()
    {
        $this->raza = new RazaModel();
        $this->especie = new EspecieModel();
        $this->session = session();

        helper(['form']);
    }

    //ver todo los activos
    public function index($activo = 1)
    {

        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }

        $razas = $this->raza->where('activo', $activo)->findAll();
        $especie = $this->especie->where('activo', 1)->findAll();

        $data = ['titulo' => 'Razas', 'datos' => $razas, 'especie' => $especie];

        echo view('header');
        echo view('nav');
        echo view('razas/raza', $data);
        echo view('footer');
    }

    //ver todo los eliminados
    public function eliminados($activo = 0)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }

        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }
        $razas = $this->raza->where('activo', $activo)->findAll();
        $especie = $this->especie->where('activo', 1)->findAll();

        $data = ['titulo' => 'Razas eliminadas', 'datos' => $razas, 'especie' => $especie];

        echo view('header');
        echo view('nav');
        echo view('razas/eliminados', $data);
        echo view('footer');
    }

    //para insertar datos
    public function insertar()
    {

        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }

        if ($this->request->getMethod() =="post" && $this->validate('reglasRazas')) {
            $this->raza->save([
                'id_especie' => $this->request->getPost('id_especie'),
                'nombre' => $this->request->getPost('nombre'),
            ]);

            return redirect()->to(base_url() . '/razas');
        } else {

            $especie = $this->especie->where('activo', 1)->findAll();
            //$categorias = $this->categorias->where('activo', 1)->findAll();

            $data = ['titulo' => 'Agregar Razas', 'especie' => $especie,'validation'=> $this->validator];

            echo view('header');
            echo view('nav');
            echo view('razas/nuevo', $data);
            echo view('footer');
        }
    }

    //trae la informacion pa editar
    public function editar($id)
    {

        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }

        $razas = $this->raza->where('id', $id)->first();
        $especie = $this->especie->where('activo', 1)->findAll();

        $data = ['titulo' => 'Editar cliente', 'raza' => $razas, 'especie' => $especie];

        echo view('header');
        echo view('nav');
        echo view('razas/editar', $data);
        echo view('footer');
    }

    //edita los datos
    public function actualizar()
    {

        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }

        $this->raza->update($this->request->getPost('id'), [
            'id_especie' => $this->request->getPost('id_especie'),
            'nombre' => $this->request->getPost('nombre'),
        ]);
        return redirect()->to(\base_url() . '/razas');
    }

    //elimina todo los datos
    public function eliminar($id)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }

        $this->raza->update($id, ['activo' => 0]);
        return redirect()->to(\base_url() . '/razas');
    }

    //reactiva a lo eliminados
    public function reingresar($id)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }
        
        $this->raza->update($id, ['activo' => 1]);
        return redirect()->to(\base_url() . '/razas');
    }
}
