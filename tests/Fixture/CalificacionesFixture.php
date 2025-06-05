<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CalificacionesFixture
 */
class CalificacionesFixture extends TestFixture
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
                'id_usuario' => 1,
                'id_actividad' => 1,
                'calificacion' => 1.5,
                'fecha_realizacion' => '2025-06-05',
            ],
        ];
        parent::init();
    }
}
