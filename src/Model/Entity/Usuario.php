<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $correo
 * @property string|null $telefono
 * @property string $usuario
 * @property string $contrasena
 * @property string $rol
 * @property string|null $clave_moderador
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Usuario extends Entity
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
        'nombres' => true,
        'apellidos' => true,
        'correo' => true,
        'telefono' => true,
        'usuario' => true,
        'contrasena' => true,
        'rol' => true,
        'created' => true,
        'modified' => true,
    ];
}
