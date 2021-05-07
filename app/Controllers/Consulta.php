<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientesModel;
use App\Models\ConsultaModel;
use App\Models\ConsultaServicioModel;
use App\Models\MascotasModel;
use App\Models\ServiciosModel;
use App\Models\VeterinariosModel;
use Pdfhojavida;
use PdfConsulta;

class Consulta extends BaseController
{
    protected $consulta, $session, $raza, $veterinario, $clientes, $servicios, $pdf, $pdfConsulta;

    public function __construct()
    {
        $this->consulta = new ConsultaModel();
        $this->mascota = new MascotasModel();
        $this->cliente = new ClientesModel();
        $this->veterinario = new VeterinariosModel();
        $this->servicio = new ServiciosModel();
        $this->consultaServicio = new ConsultaServicioModel();
        $this->session = session();
        $this->pdf = new Pdfhojavida('P', 'mm', 'Legal');
        $this->pdfConsulta = new PdfConsulta('P', 'mm', 'Legal');
        helper(['form']);
    }

    public function index($id_mascota)
    {
        $consultas = $this->consulta->getList($id_mascota);
        $servicios = $this->servicio->where('activo', 1)->findAll();
        if (empty($consultas)) {
            $flag = true;
        } else {
            $flag = false;
        }
        
        $data = ['titulo' => 'Consultas', 'datos' => $consultas, 'servicios' => $servicios,'flag'=>$flag];
        $data['idMascota'] = $id_mascota;

        echo view('header');
        echo view('nav');
        echo view('consultas/consultas', $data);
        echo view('footer');
    }

    public function insertar($id_mascota = null)
    {
        $postData = $this->request->getGet();
        if ($this->request->getMethod() == "post") {

            $postDataEdit = $this->request->getPost();
            if ($postDataEdit['id_consulta'] == null) {
                $dataconsulta = array(
                    'id_mascota' => $this->request->getPost('id_mascota'),
                    'id_veterinario' => $this->session->id_usuario,
                    'fecha' => $this->request->getPost('date'),
                    'pesoMascota' => $this->request->getPost('peso'),
                );
                $consultaId = $this->consulta->insert_consulta($dataconsulta);

                $servicios = $this->request->getPost('datos');

                foreach ($servicios as $servicio) {
                    $this->consultaServicio->save([
                        'id_servicio' => $servicio[0],
                        'id_consulta' => $consultaId,
                        'observacion' => $servicio[1],
                        'precio' => $servicio[2],
                    ]);
                }
            } else {
                $dataconsultaEdit = array(
                    'id_mascota' => $this->request->getPost('id_mascota'),
                    'id_veterinario' => $this->session->id_usuario,
                    'fecha' => $this->request->getPost('date'),
                    'pesoMascota' => $this->request->getPost('peso'),
                );
                $this->consulta->update($postDataEdit['id_consulta'], $dataconsultaEdit);
                $servicios = $this->request->getPost('datos');

                foreach ($servicios as $servicio) {
                    $this->consultaServicio->where('id_consulta', $postDataEdit['id_consulta'])->delete();
                }
                foreach ($servicios as $servicio) {
                    $this->consultaServicio->save([
                        'id_servicio' => $servicio[0],
                        'id_consulta' => $postDataEdit['id_consulta'],
                        'observacion' => $servicio[1],
                        'precio' => $servicio[2],
                    ]);
                }
            }
            return redirect()->to(base_url() . '/consulta/index/<?= @$id_mascota;?>');
        } else {


            if (isset($postData['id_consulta']) == null) {

                $servicios = $this->servicio->where('activo', 1)->findAll();
                $data = ['titulo' => 'Agregar consulta', 'subtitulo' => 'Servicios', 'servicios' => $servicios, 'serviciosconsulta' => []];
                $data['idmascota'] = $id_mascota;

                echo view('header');
                echo view('nav');
                echo view('consultas/nuevo', $data);
                echo view('footer');
            } else {
                // print_r($id_mascota);die();

                $response['dataconsulta'] = $this->consulta->getConsulta($postData['id_consulta']);
                $response['dataservicio'] = $this->consulta->getConsultaService($postData['id_consulta']);
                $servicios = $this->servicio->where('activo', 1)->findAll();

                $data = [
                    'titulo' => 'Editar consulta',
                    'subtitulo' => 'Servicios',
                    'servicios' => $servicios,
                    'consulta' => $response['dataconsulta'],
                    'serviciosconsulta' => $response['dataservicio']
                ];

                $data['idmascota'] = $id_mascota;

                echo view('header');
                echo view('nav');
                echo view('consultas/nuevo', $data);
                echo view('footer');

            }
        }
    }

    public function detalles()
    {

        $postData = $this->request->getGet();
        $response['dataconsulta'] = $this->consulta->getConsulta($postData['idconsulta']);
        $response['dataservicio'] = $this->consulta->getConsultaService($postData['idconsulta']);
        //print_r($response['dataservicio'] ); die();

        if ($response['dataconsulta'] > 0) {
            $response['flag'] = true;
            return json_encode($response);
        } else {
            $response['flag'] = false;
            return json_encode($response);
        }
    }
    
    public function imprimirhojavida()
    {

        $postData = $this->request->getGet();

        $response['dataconsulta'] = $this->consulta->getConsultaMascota($postData['id']);

        // $response['consultas'] = $this->consulta->getConsultaServiceMascota($postData['id']);

        $consultas = $this->consulta->getMscotaConsutas($postData['id']);

        $arrayServicios = [];
        $servicio = [];
        for ($i = 0; $i < count($consultas); $i++) {

            $servicio['consultas'][] = $this->consulta->getConsultaServiceMascota($consultas[$i]->id);

            $arrayServicios[$i]  = $this->consulta->serviciosconsultamascota($consultas[$i]->id);
        }

        $this->pdf->AddPage();
        $this->pdf->Head(0);
        $this->pdf->Top(35, $response['dataconsulta']);
        $this->pdf->Body(50, $servicio, $arrayServicios);
        $this->pdf->Output();
        exit;
    }

    public function imprimirconsulta()
    {

        $postData = $this->request->getGet();

        $response['dataconsulta'] = $this->consulta->getConsulta($postData['id']);
        $response['dataservicio'] = $this->consulta->getConsultaService($postData['id']);

        $this->pdfConsulta->AddPage();
        $this->pdfConsulta->Head(0);
        $this->pdfConsulta->Top(35, $response['dataconsulta']);
        $this->pdfConsulta->Body(50, $response['dataconsulta'], $response['dataservicio']);
        $this->pdfConsulta->Output();
        exit;
    }

}
