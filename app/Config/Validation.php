<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	//reglas veterinarios
	public $reglas = [
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

	public $ReglasLogin = [
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

	public $ReglasActualizar = [
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

	//reglas razas
	public $reglasRazas = [
		'nombre' => [
			'rules' => 'required|is_unique[raza.nombre]',
			'errors' => [
				'required' => 'El nombre es requerido',
				'is_unique' => 'La raza ya existe.',
			],
		],
	];

	/*$2y$10$nkKZd801apWsBZ/3Aj8.5.ndtMLOqNaImLJJGuOqqQkmFUqHHItRa */

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
