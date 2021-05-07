<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientesModel;
use App\Models\EspecieModel;
use App\Models\MascotasModel;
use App\Models\RazaModel;

class Mascotas extends BaseController
{
    protected $mascotas, $session, $raza, $especie, $clientes;

    public function __construct()
    {
        $this->mascota = new MascotasModel();
        $this->raza = new RazaModel();
        $this->cliente = new ClientesModel();
        $this->especie = new EspecieModel();
        $this->session = session();
        helper(['form']);
    }

    public function index($id_cliente = null)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }

        
        $mascotas = $this->mascota->getList($id_cliente);

        $datacliente = ['id_cliente' => $id_cliente];
        

        $this->session->set($datacliente);
        //print_r($this->session->get('id_cliente'));
        //die();

        $data = ['titulo' => 'Mascotas', 'datos' => $mascotas];
        $data['idcliente'] = $id_cliente;

        echo view('header');
        echo view('nav');
        echo view('mascotas/mascotas', $data);
        echo view('footer');
    }

    public function eliminados($id_cliente, $activo = 0)
    {
        $mascotas = $this->mascota->where('id_cliente', $id_cliente)->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Mascotas eliminadas', 'datos' => $mascotas];
        $data['idcliente'] = $id_cliente;

        echo view('header');
        echo view('nav');
        echo view('mascotas/eliminados', $data);
        echo view('footer');
    }

    /* sirve para traer  segun la opcion de especie que se escoja*/

    public function especie_raza($activo = 1)
    {
        $id_especie = $this->request->getPost("id_especie");
        $raza = $this->raza->where('id_especie', $id_especie)->where('activo', $activo)->findAll();
        $option = "<option selected disabled value=''>Seleccionar Raza</option>";
        foreach ($raza as $row) {
            $option .= "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
        }
        echo $option;
    }

    public function insertar($id = null)
    {
        if ($this->request->getMethod() == "post") {
            $this->mascota->save([
                'id_cliente' => $this->request->getPost('id_cliente'),
                'id_especie' => $this->request->getPost('id_especie'),
                'id_raza' => $this->request->getPost('id_raza'),
                'nombre' => $this->request->getPost('nombre'),
                'edad' => $this->request->getPost('edad'),
                'sexo' => $this->request->getPost('sexo'),
                'pelaje' => $this->request->getPost('pelaje'),
            ]);
            return redirect()->to(base_url() . '/mascotas/index/' . $this->request->getPost('id_cliente'));
        } else {

            $raza = $this->raza->where('activo', 1)->findAll();
            $especie = $this->especie->where('activo', 1)->findAll();

            $data = ['titulo' => 'Agregar mascotas', 'raza' => $raza, 'especie' => $especie];
            $data['idcliente'] = $id;

            echo view('header');
            echo view('nav');
            echo view('Mascotas/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id_cliente, $id)
    {

        //   var_dump($id_cliente,$id);
        //   exit;

        $mascotas = $this->mascota->where('id', $id)->first();
        $especie = $this->especie->where('activo', 1)->findAll();
        $raza = $this->raza->where('activo', 1)->findAll();

        $data = ['titulo' => 'Editar Mascota', 'mascotas' => $mascotas, 'especie' => $especie, 'raza' => $raza];
        $data['idcliente'] = $id_cliente;

        echo view('header');
        echo view('nav');
        echo view('mascotas/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {

        $this->mascota->update($this->request->getPost('id'), [
            'id_cliente' => $this->request->getPost('id_cliente'),
            'id_especie' => $this->request->getPost('id_especie'),
            'id_raza' => $this->request->getPost('id_raza'),
            'nombre' => $this->request->getPost('nombre'),
            'edad' => $this->request->getPost('edad'),
            'sexo' => $this->request->getPost('sexo'),
            'pelaje' => $this->request->getPost('pelaje'),
        ]);
        return redirect()->to(base_url() . '/mascotas/index/' . $this->request->getPost('id_cliente'));
    }

    public function eliminar($id_cliente, $id_eliminar)
    {
        $this->mascota->update($id_eliminar, ['activo' => 0]);
        return redirect()->to(base_url() . '/mascotas/index/' . $id_cliente);
    }

    public function reingresar($id_cliente, $id)
    {
        $this->mascota->update($id, ['activo' => 1]);

        return redirect()->to(base_url() . '/mascotas/index/' . $id_cliente);
    }

    /*
public function buscarPorCodigo($codigo)
{
$this->productos->select('*');
$this->productos->where('codigo', $codigo);
$this->productos->where('activo', 1);

$datos = $this->productos->get()->getRow();

$res['existe'] = false;
$res['datos'] = '';
$res['error'] = '';

if ($datos) {
$res['datos'] = $datos;
$res['existe'] = true;
} else {
$res['error'] = 'No existe el producto';
$res['existe'] = false;
}

echo json_encode($res);
}
 */
}
