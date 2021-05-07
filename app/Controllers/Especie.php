<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EspecieModel;

class Especie extends BaseController
{
    protected $especie,$mascotas;

    public function __construct()
    {
        $this->especie = new EspecieModel();
        
        helper(['form']);
    }

    public function index($activo = 1)
    {

        $especie = $this->raza->where('activo', $activo)->findAll();
        $especie = $this->especie->where('activo', 1)->findAll();

        $data = ['titulo' => 'Especie', 'datos' => $especie,'especie'=>$especie];

        echo view('header');
        echo view('nav');
        echo view('especie/raza', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        $especie = $this->raza->where('activo', $activo)->findAll();
        $especie = $this->especie->where('activo', 1)->findAll();

        $data = ['titulo' => 'Especie eliminadas', 'datos' => $especie,'especie'=>$especie];

        echo view('header');
        echo view('nav');
        echo view('especie/eliminados', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post") {
            $this->raza->save([
                'id_especie' => $this->request->getPost('id_especie'),
                'nombre' => $this->request->getPost('nombre'),]);

            return redirect()->to(base_url() . '/especie');
        } else {

            $especie = $this->especie->where('activo', 1)->findAll();
            //$categorias = $this->categorias->where('activo', 1)->findAll();

            $data = ['titulo' => 'Agregar Especie','especie' => $especie];

            echo view('header');
            echo view('nav');
            echo view('especie/nuevo', $data);
            echo view('footer');
        }

    }

    public function editar($id)
    {

        $especie = $this->raza->where('id', $id)->first();
        $especie = $this->especie->where('activo', 1)->findAll();

        $data = ['titulo' => 'Editar cliente', 'raza' => $especie,'especie' => $especie];

        echo view('header');
        echo view('nav');
        echo view('especie/editar', $data);
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
            'email' => $this->request->getPost('email')]);
        return redirect()->to(\base_url() . '/especie');
    }

    public function eliminar($id)
    {
        $this->raza->update($id, ['activo' => 0]);
        return redirect()->to(\base_url() . '/especie');
    }

    public function reingresar($id)
    {
        $this->raza->update($id, ['activo' => 1]);
        return redirect()->to(\base_url() . '/especie');
    }

}
