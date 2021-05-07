<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientesModel;
use App\Models\MascotasModel;

class Clientes extends BaseController
{
    protected $clientes, $session, $mascotas;

    public function __construct()
    {
        $this->cliente = new ClientesModel();
        $this->mascota = new MascotasModel();
        $this->session = session();
        helper(['form']);
    }

    public function index($activo = 1)
    {

        
        $clientes = $this->cliente->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Clientes', 'datos' => $clientes];

        echo view('header');
        echo view('nav');
        echo view('clientes/clientes', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {

        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }
        
        $clientes = $this->cliente->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Clientes activos', 'datos' => $clientes];

        echo view('header');
        echo view('nav');
        echo view('clientes/eliminados', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post") {
            $this->cliente->save([
                'tipoDoc' => $this->request->getPost('tipoDoc'),
                'cedula' => $this->request->getPost('cedula'),
                'pasaporte' => $this->request->getPost('pasaporte'),
                'apellido' => $this->request->getPost('apellido'),
                'nombre' => $this->request->getPost('nombre'),
                'direccion' => $this->request->getPost('direccion'),
                'convencional' => $this->request->getPost('convencional'),
                'telefono' => $this->request->getPost('telefono'),
                'email' => $this->request->getPost('email')]);

            return redirect()->to(base_url() . '/clientes');
        } else {

            $data = ['titulo' => 'Agregar Cliente'];

            echo view('header');
            echo view('nav');
            echo view('clientes/nuevo', $data);
            echo view('footer');
        }

    }

    public function editar($id)
    {

        $clientes = $this->cliente->where('id', $id)->first();

        $data = ['titulo' => 'Editar cliente', 'cliente' => $clientes];

        echo view('header');
        echo view('nav');
        echo view('clientes/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {

        $this->cliente->update($this->request->getPost('id'), [
            'tipoDoc' => $this->request->getPost('tipoDoc'),
            'cedula' => $this->request->getPost('cedula'),
            'pasaporte' => $this->request->getPost('pasaporte'),
            'apellido' => $this->request->getPost('apellido'),
            'nombre' => $this->request->getPost('nombre'),
            'direccion' => $this->request->getPost('direccion'),
            'convencional' => $this->request->getPost('convencional'),
            'telefono' => $this->request->getPost('telefono'),
            'email_cliente' => $this->request->getPost('email_cliente')]);
        return redirect()->to(base_url() . '/clientes');
    }

    public function eliminar($id)
    {
        $this->cliente->update($id, ['activo' => 0]);
        return redirect()->to(base_url() . '/clientes');
    }

    public function reingresar($id)
    {
        $this->cliente->update($id, ['activo' => 1]);
        return redirect()->to(base_url() . '/clientes');
    }

}
