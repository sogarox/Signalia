<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosFixture
 */
class UsuariosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nombres' => 'Lorem ipsum dolor sit amet',
                'apellidos' => 'Lorem ipsum dolor sit amet',
                'correo' => 'Lorem ipsum dolor sit amet',
                'telefono' => 'Lorem ipsum dolor ',
                'usuario' => 'Lorem ipsum dolor sit amet',
                'contrasena' => 'Lorem ipsum dolor sit amet',
                'rol' => 'Lorem ipsum dolor sit amet',
                'clave_moderador' => 'Lorem ipsum dolor sit amet',
                'created' => 1748744417,
                'modified' => 1748744417,
            ],
        ];
        parent::init();
    }
}
