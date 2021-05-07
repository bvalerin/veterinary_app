<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogsModel;
use App\Models\VeterinariosModel;

class Veterinarios extends BaseController
{
    protected $veterinarios, $session, $logs;
    protected $reglas, $reglasLogin, $reglasActualizar;

    public function __construct()
    {
        $this->veterinario = new VeterinariosModel();
        $this->logs = new LogsModel();
        $this->session = session();

        helper(['form']);

        $this->reglas = [
            'cedula' => [
                'rules' => 'is_unique[veterinario.cedula]',
                'errors' => [
                    'is_unique' => 'La {field} ya existe.',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
            'repassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'matches' => 'El passwords no coincide.',
                ],
            ],
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
            'apellido' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
            'matricula' => [
                'rules' => 'required|is_unique[veterinario.matricula]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El numero de {field} ya existe.',
                ],
            ],
            'telefono' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
            'email' => [
                'rules' => 'required|is_unique[veterinario.email]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El {field} ya existe.',
                ],
            ],
            'direccion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
        ];

        $this->reglasLogin = [
            'usuario' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
        ];

        $this->reglasActualizar = [
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ],
            ],
            'repassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'matches' => 'El passwords no coincide.',
                ],
            ],
        ];
    }

    public function index()
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }

        $veterinarios = $this->veterinario->where('id>', 1)->where('activo',1)->findAll();

        $data = ['titulo' => 'Veterinarios', 'datos' => $veterinarios];

        echo view('header');
        echo view('nav');
        echo view('veterinarios/veterinarios', $data);
        echo view('footer');
    }

    public function eliminados($activo = 0)
    {
        if (!isset($this->session->id_usuario)) {
            return redirect()->to(base_url());
        }

        $veterinarios = $this->veterinario->where('activo', $activo)->findAll();

        $data = ['titulo' => 'Veterinarios eliminados', 'datos' => $veterinarios];

        echo view('header');
        echo view('nav');
        echo view('veterinarios/eliminados', $data);
        echo view('footer');
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglas)) {

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->veterinario->save([
                'tipoDoc' => $this->request->getPost('tipoDoc'),
                'cedula' => $this->request->getPost('cedula'),
                'pasaporte' => $this->request->getPost('pasaporte'),
                'matricula' => $this->request->getPost('matricula'),
                'apellido' => $this->request->getPost('apellido'),
                'nombre' => $this->request->getPost('nombre'),
                'usuario' => $this->request->getPost('usuario'),
                'password' => $hash,
                'email' => $this->request->getPost('email'),
                'direccion' => $this->request->getPost('direccion'),
                'convencional' => $this->request->getPost('convencional'),
                'telefono' => $this->request->getPost('telefono'),
            ]);

            return redirect()->to(base_url() . '/veterinarios');
        } else {

            $data = ['titulo' => 'Agregar Veterinario', 'subtitulo' => 'Agregar Usuario', 'validation' => $this->validator];

            echo view('header');
            echo view('nav');
            echo view('veterinarios/nuevo', $data);
            echo view('footer');
        }
    }

    public function editar($id)
    {

        $veterinarios = $this->veterinario->where('id', $id)->first();

        $data = ['titulo' => 'Editar Veterinario', 'subtitulo' => 'Editar usuario', 'veterinarios' => $veterinarios];

        echo view('header');
        echo view('nav');
        echo view('veterinarios/editar', $data);
        echo view('footer');
    }

    public function actualizar()
    {

        $this->veterinario->update($this->request->getPost('id'), [
            'pasaporte' => $this->request->getPost('pasaporte'),
            'apellido' => $this->request->getPost('apellido'),
            'nombre' => $this->request->getPost('nombre'),
            'usuario' => $this->request->getPost('usuario'),
            'direccion' => $this->request->getPost('direccion'),
            'convencional' => $this->request->getPost('convencional'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $this->request->getPost('email'),
        ]);
        return redirect()->to(\base_url() . '/veterinarios');
    }

    public function eliminar($id)
    {
        $this->veterinario->update($id, ['activo' => 0]);
        return redirect()->to(\base_url() . '/veterinarios');
    }

    public function reingresar($id)
    {
        $this->veterinario->update($id, ['activo' => 1]);
        return redirect()->to(\base_url() . '/veterinarios');
    }

    public function login()
    {
        echo view('login');
    }

    public function valida()
    {
        if ($this->request->getMethod() == "post" && $this->validate($this->reglasLogin)) {

            $usuario = $this->request->getPost('usuario');
            $password = $this->request->getPost('password');

            $datosUsuario = $this->veterinario->where('usuario', $usuario)->first();

            if ($datosUsuario != null) {
                if (password_verify($password, $datosUsuario['password'])) {
                    $datosSesion = [
                        'id_usuario' => $datosUsuario['id'],
                        'tipoDoc' => $datosUsuario['tipoDoc'],
                        'cedula' => $datosUsuario['cedula'],
                        'pasaporte' => $datosUsuario['pasaporte'],
                        'apellido' => $datosUsuario['apellido'],
                        'nombre' => $datosUsuario['nombre'],
                        'direccion' => $datosUsuario['direccion'],
                        'convencional' => $datosUsuario['convencional'],
                        'telefono' => $datosUsuario['telefono'],
                        'email' => $datosUsuario['email'],
                    ];

                    /*sirve para realizar los log de ingresos
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $detalles = $_SERVER['HTTP_USER_AGENT'];
                    $this->logs->save([
                    'id_veterinario' => $datosUsuario['id'],
                    'evento' => 'Inicio de sesion',
                    'ip' => $ip,
                    'detalles' => $detalles,
                    ]);
                     */

                    $ip = $_SERVER['REMOTE_ADDR'];
                    $detalles = $_SERVER['HTTP_USER_AGENT'];
                    $this->logs->save([
                        'id_veterinario' => $datosUsuario['id'],
                        'evento' => 'Inicio de sesion',
                        'ip' => $ip,
                        'detalles' => $detalles,
                    ]);

                    $session = session();
                    $session->set($datosSesion);

                    return redirect()->to(base_url() . '/agendamiento/indexTotal');
                } else {
                    $data['error'] = "El usuario o la contraseña no coincide";
                    echo view('login', $data);
                }
            } else {
                $data['error'] = "El usuario no existe";
                echo view('login', $data);
            }
        } else {
            $data = ['validation' => $this->validator];
            echo view('login', $data);
        }
    }

    public function logout()
    {

        $session = session();

        $ip = $_SERVER['REMOTE_ADDR'];
        $detalles = $_SERVER['HTTP_USER_AGENT'];
        $this->logs->save([
            'id_veterinario' => $session->id_usuario,
            'evento' => 'Cierre de sesion',
            'ip' => $ip,
            'detalles' => $detalles,
        ]);

        $session->destroy();

        return redirect()->to(base_url());
    }

    public function cambio_password()
    {

        $session = session();
        $veterinarios = $this->veterinario->where('id', $session->id_usuario)->first();

        $data = ['titulo' => 'Informacion', 'subtitulo' => 'Cambiar usuario o contraseña', 'veterinarios' => $veterinarios];

        echo view('header');
        echo view('nav');
        echo view('veterinarios/cambio_pass', $data);
        echo view('footer');
    }

    public function actualizar_password()
    {

        if ($this->request->getMethod() == "post" && $this->validate($this->reglasActualizar)) {

            $session = session();
            $idUsuario = $session->id_usuario;

            $hash = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

            $this->veterinario->update($idUsuario, ['password' => $hash]);

            $veterinarios = $this->veterinario->where('id', $session->id_usuario)->first();

            $data = ['titulo' => 'Informacion', 'subtitulo' => 'Cambiar contraseña', 'veterinarios' => $veterinarios, 'mensaje' => 'Contraseña actualizada'];

            echo view('header');
            echo view('nav');
            echo view('veterinarios/cambio_pass', $data);
            echo view('footer');
        } else {

            $session = session();
            $veterinarios = $this->veterinario->where('id', $session->id_usuario)->first();

            $data = ['titulo' => 'Cambiar contraseña', 'veterinarios' => $veterinarios, 'validation' => $this->validator];

            echo view('header');
            echo view('nav');
            echo view('veterinarios/cambio_pass', $data);
            echo view('footer');
        }
    }

    public function profile()
    {
        $session = session();
        $veterinarios = $this->veterinario->where('id', $session->id_usuario)->first();
        $data = ['titulo' => 'Informacion del veterinario', 'subtitulo' => 'Informacion del usuario', 'veterinarios' => $veterinarios];

        echo view('header');
        echo view('nav');
        echo view('veterinarios/profile', $data);
        echo view('footer');
    }
}
