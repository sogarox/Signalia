<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Modulo Entity
 *
 * @property int $id
 * @property int $id_curso
 * @property string $titulo
 * @property string $descripcion
 * @property int $orden
 */
class Modulo extends Entity
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
        'id_curso' => true,
        'titulo' => true,
        'descripcion' => true,
        'orden' => true,
    ];
}
