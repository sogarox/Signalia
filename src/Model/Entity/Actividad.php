<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Actividad Entity
 *
 * @property int $id
 * @property int $id_modulo
 * @property string $titulo
 * @property string $descripcion
 * @property string|null $tipo
 * @property string|null $contenido
 * @property string|null $respuesta_correcta
 */
class Actividad extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'id_modulo' => true,
        'titulo' => true,
        'descripcion' => true,
        'tipo' => true,
        'contenido' => true,
        'respuesta_correcta' => true,
    ];
}
