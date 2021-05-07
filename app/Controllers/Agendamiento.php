<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgendamientoModel;
use App\Models\ClientesModel;
use App\Models\MascotasModel;
use App\Models\ServiciosModel;
use App\Models\VeterinariosModel;

class Agendamiento extends BaseController
{
    protected $agendamiento, $session, $mascota, $veterinario, $clientes, $servicios;

    public function __construct()
    {
        $this->agendamiento = new AgendamientoModel();
        $this->mascota = new MascotasModel();
        $this->cliente = new ClientesModel();
        $this->veterinario = new VeterinariosModel();
        $this->servicio = new ServiciosModel();
        $this->session = session();
        helper(['form']);
    }

    public function index($id_mascota = null)
    {

        $agendamiento = $this->agendamiento->getList($id_mascota);

        $data = ['titulo' => 'Agendendamiento', 'datos' => $agendamiento];
        $data['id_mascota'] = $id_mascota;

        echo view('header');
        echo view('nav');
        echo view('agendamiento/agendamiento', $data);
        echo view('footer');
    }

    public function indexTotal()
    {

        $agendamiento = $this->agendamiento->getListTotal();
        $data = ['titulo' => 'Agendendamiento del dia', 'datos' => $agendamiento];
        //$data['idmascota'] = $id_mascota;

        echo view('header');
        echo view('nav');
        echo view('agendamiento/agendamientoTotal', $data);
        echo view('footer');
    }

    public function reingresarTotal($id_mascota, $id)
    {
        $this->agendamiento->update($id, ['activo' => 1]);

        return redirect()->to(base_url() . '/agendamiento/indexTotal');
    }

    public function eliminadosTotal()
    {
        $agendamiento = $this->agendamiento->getListDeleteTotal();

        $data = ['titulo' => 'Agendamiento eliminados', 'datos' => $agendamiento];
        //$data['idmascota'] = $id_mascota;

        echo view('header');
        echo view('nav');
        echo view('agendamiento/eliminadosTotal', $data);
        echo view('footer');
    }

    public function eliminarTotal($id_mascota, $id_eliminar)
    {
        $this->agendamiento->update($id_eliminar, ['activo' => 0]);
        return redirect()->to(base_url() . '/consulta/index/' . $id_mascota);
    }

    public function eliminados($id_mascota)
    {
        $agendamiento = $this->agendamiento->getListDelete($id_mascota);

        $data = ['titulo' => 'Consulta eliminadas', 'datos' => $agendamiento];
        $data['idmascota'] = $id_mascota;

        echo view('header');
        echo view('nav');
        echo view('agendamiento/eliminados', $data);
        echo view('footer');
    }

    public function reingresar($id_mascota, $id)
    {
        $this->agendamiento->update($id, ['activo' => 1]);

        return redirect()->to(base_url() . '/agendamiento/index/' . $id_mascota);
    }

    public function insertar($id_mascota = null)
    {
        if ($this->request->getMethod() == "post") {
            $email = \Config\Services::email();

            $this->agendamiento->save([
                'id_mascota' => $this->request->getPost('id_mascota'),
                'id_cliente' => $this->request->getPost('id_cliente'),
                'fecha' => $this->request->getPost('fecha'),
                'asunto' => $this->request->getPost('asunto'),
                'contenido' => $this->request->getPost('contenido'),
            ]);
            
            $email->setTo($this->request->getPost('email_cliente'));
            $mensaje = '
      <!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Narrative Invitation Email</title>
<style type="text/css">

/* Take care of image borders and formatting */

img {
  max-width: 600px;
  outline: none;
  text-decoration: none;
  -ms-interpolation-mode: bicubic;
}

a {
  border: 0;
  outline: none;
}

a img {
  border: none;
}

/* General styling */

td, h1, h2, h3  {
  font-family: Helvetica, Arial, sans-serif;
  font-weight: 400;
}

td {
  font-size: 13px;
  line-height: 19px;
  text-align: left;
}

body {
  -webkit-font-smoothing:antialiased;
  -webkit-text-size-adjust:none;
  width: 100%;
  height: 100%;
  color: #37302d;
  background: #ffffff;
}

table {
  border-collapse: collapse !important;
}


h1, h2, h3, h4 {
  padding: 0;
  margin: 0;
  color: #444444;
  font-weight: 400;
  line-height: 110%;
}

h1 {
  font-size: 35px;
}

h2 {
  font-size: 30px;
}

h3 {
  font-size: 24px;
}

h4 {
  font-size: 18px;
  font-weight: normal;
}

image{
  
}


</style>

<style type="text/css" media="screen">
    @media screen {
      @import url(http://fonts.googleapis.com/css?family=Open+Sans:400);

      /* Thanks Outlook 2013! */
      td, h1, h2, h3 {
        font-family: Open Sans, Helvetica Neue, Arial, sans-serif !important;
      }
    }
</style>

</style>
</head>
<body class="body" style="padding:0; margin:0; display:block; background:#ffffff; -webkit-text-size-adjust:none" bgcolor="#ffffff">
<table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%">
<tr>
  <td align="center" valign="top" bgcolor="#ffffff"  width="100%">

  <table cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td style="background:#1f1f1f" width="100%">

        <center>
          <table cellspacing="0" cellpadding="0" width="600" class="w320">
            <tr>
              <td valign="top" width="270" style="background:#1f1f1f; text-align:left;">
                <a href="#" style="text-decoration:none;">
                  <img src="https://i.pinimg.com/originals/e6/01/a8/e601a882de5917b8c378d57d596472ec.png" width="50" height="50" alt="Your Logo"/>
                </a>

              </td>
              <td>
                <h2 style="color: #f8f8f8; text-align:left;">
                  Veterinaria del sur
                </h2>
              </td>

            </tr>
          </table>
        </center>

      </td>
    </tr>
    <tr>
      <td style="border-bottom:1px solid #e7e7e7;">

        <center>
          <table cellpadding="0" cellspacing="0" width="600" class="w320">
            <tr>
              <td align="left" class="mobile-padding" style="padding:20px 20px 30px">

                <br class="mobile-hide" />

                <h1>Veterinaria del sur<br></h1>
                <h3>Agendamiento de cita</h3>

                <br>

                <br>
                <strong>' . $this->request->getPost('fecha') . '.</strong>
                Recibimos una solicitud de nueva contraseña para su cuenta en el sistema de farmacia.
                <br>
                Hemos generado una contraseña nueva automática, la cual usted debe ir al sistema de inmediato a cambiarla.
                <br>
                La contrasena es:
                <br>
                <br>


                <br>
                Esta contraseña debera cambiarse una vez cumplida su función de contraseña alternativa.
                <br>
                <br>
                <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
                  <tr>
                    <td style="width:130px;background:#D84A38;">
                      <div>
                      

                      </div>
                    </td>
                    <td width="316" style="background-color:#ffffff; font-size:0; line-height:0;">&nbsp;</td>
                  </tr>
                </table>
              </td>
              <td class="mobile-hide" style="padding-top:20px;padding-bottom:0;">
                <table cellspacing="0" cellpadding="0" width="100%">
                  <tr>
                    <td align="right" width="220" style="padding-right:20px; vertical-align:middle;">
                      <table width="94" align="right" cellpadding="0" cellspacing="0">
                        <tr>
                          <td style="border:2px solid #000000">
                            <img src="https://i.pinimg.com/originals/f6/69/cf/f669cfe4d8c72491ac1a8f407037490e.jpg" style="display:block" width="120" height="90" alt="profile"/>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </center>

      </td>
    </tr>
    <tr>
      <td valign="top" style="background-color:#f8f8f8;border-bottom:1px solid #e7e7e7;">

        <center>
          <table border="0" cellpadding="0" cellspacing="0" width="600" class="w320" style="height:100%;">
            <tr>
              <td valign="top" class="mobile-padding" style="padding:20px;">
                <h2>Centro de ayuda</h2>
                <br>
                * Si usted tiene problemas para recuperar su contrasena puede volver a generar la solicitud de cambio de contrasena.
                <br>
                * Si el problema persiste pongase en contacto con el administrador del sistema.
                <br><br>
                Atentamente. <strong>Centro de recuperacion de constrasenas</strong><br>

                <br>
              </td>
            </tr>
          </table>
        </center>

      </td>
    </tr>

    <tr>
      <td style="background-color:#1f1f1f;">
        <center>
          <table border="0" cellpadding="0" cellspacing="0" width="600" class="w320" style="height:100%;color:#ffffff" bgcolor="#1f1f1f" >
            <tr>
              <td align="left" valign="middle" class="mobile-padding" style="font-size:12px;padding:20px; background-color:#1f1f1f; color:#ffffff; text-align:center; ">
                <h4 style="color:#ffffff;"  href="#">Creado por DASE | 2020</h4>

              </td>
            </tr>
          </table>
        </center>
      </td>
    </tr>
  </table>

  </td>
</tr>
</table>
</body>
</html>
';

            $email->setSubject($this->request->getPost('asunto'));
            $email->setMessage($mensaje);

            $email->send();
            return redirect()->to(base_url() . '/agendamiento/index/' . $this->request->getPost('id_mascota'));
        } else {


            $clientes = $this->cliente->where('activo', 1)->findAll();

            $cliente = $this->session->get('id_cliente');

            $data = ['titulo' => 'Agregar consulta', 'datos' => $clientes];
            $data['id_mascota'] = $id_mascota;
            $data['id_cliente'] = $cliente;


            echo view('header');
            echo view('nav');
            echo view('agendamiento/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id)
    {
        $consulta = $this->mascota->where('id', $id)->first();
        $especie = $this->especie->where('activo', 1)->findAll();
        $raza = $this->raza->where('activo', 1)->findAll();

        $data = ['titulo' => 'Editar Mascota', 'consulta' => $consulta, 'especie' => $especie, 'raza' => $raza];

        echo view('header');
        echo view('nav');
        echo view('consulta/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {

        $this->mascota->update($this->request->getPost('id'), [
            'id_raza' => $this->request->getPost('id_raza'),
            'nombre' => $this->request->getPost('nombre'),
            'fechaNac' => $this->request->getPost('fechaNac'),
            'sexo' => $this->request->getPost('sexo'),
            'pelaje' => $this->request->getPost('pelaje'),
        ]);
        return redirect()->to(base_url() . '/consulta/index');
    }

    public function eliminar($id)
    {
        $this->mascota->update($id, ['activo' => 0]);
        return redirect()->to(\base_url() . '/consulta/index');
    }
}
