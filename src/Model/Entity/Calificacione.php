<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Calificacione Entity
 *
 * @property int $id
 * @property int $id_usuario
 * @property int $id_actividad
 * @property string $calificacion
 * @property \Cake\I18n\FrozenDate $fecha_realizacion
 */
class Calificacione extends Entity
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
        'id_usuario' => true,
        'id_actividad' => true,
        'calificacion' => true,
        'fecha_realizacion' => true,
    ];
}
