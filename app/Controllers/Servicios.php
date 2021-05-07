<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ServiciosModel;

class Servicios extends BaseController
{
    protected $servicios;

    public function __construct()
    {
        $this->servicio = new ServiciosModel();

        helper(['form']);
    }

    public function searchServiceByName(){
        try {
            $existe = true;
            $nombre = $this->request->getPost('nombre');
            $servicio = $this->servicio->where('nombre', $nombre)->first();
            if(empty($servicio))
                $existe = false; //Si el if es de una sola linea lo puedes poner sin las llaves
            echo json_encode(['existe' =>  $existe]);
        } catch (\Throwable $th) {
            
        }
    }

    public function index($activo = 1)
    {

        $servicios = $this->servicio->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Servicios', 'datos' => $servicios];

        echo view('header');
        echo view('nav');
        echo view('servicios/servicios', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        $servicios = $this->servicio->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Servicios eliminadas', 'datos' => $servicios];

        echo view('header');
        echo view('nav');
        echo view('servicios/eliminados', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post") {
            $this->servicio->save([
                'nombre' => $this->request->getPost('nombre'),
                'descripcion' => $this->request->getPost('descripcion'),
                'precio' => $this->request->getPost('precio'),
            ]);

            return redirect()->to(base_url() . '/servicios');
        } else {

            $data = ['titulo' => 'Agregar Servicios'];

            echo view('header');
            echo view('nav');
            echo view('servicios/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id)
    {

        $servicios = $this->servicio->where('id', $id)->first();
    
        $data = ['titulo' => 'Editar cliente', 'servicios' => $servicios];

        echo view('header');
        echo view('nav');
        echo view('servicios/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {

        $this->servicio->update($this->request->getPost('id'), [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
        ]);
        return redirect()->to(\base_url() . '/servicios');
    }

    public function eliminar($id)
    {
        $this->servicio->update($id, ['activo' => 0]);
        return redirect()->to(\base_url() . '/servicios');
    }

    public function reingresar($id)
    {
        $this->servicio->update($id, ['activo' => 1]);
        return redirect()->to(\base_url() . '/servicios');
    }

}
