<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'active' => true,
        'first_name' => true,
        'middle_name' => true,
        'last_name' => true,
        'email' => true,
        'password' => true,
        'created_by' => true,
        'modified_by' => true,
        'roles' => true,
    ];

    /**
     * _setPassword description
     *
     * @param string $password hashes password before storing to database
     */
    protected function _setPassword($password) {
        return (new DefaultPasswordHasher)->hash($password);
    }

    protected function _getFullName() {
        return $this->_properties['first_name'] . ' ' . $this->_properties['last_name'];
    }
}
