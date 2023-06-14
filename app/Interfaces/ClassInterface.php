<?php

namespace App\Interfaces;


interface ClassInterface
{
    /**
     * Get all users
     *
     * @method  GET api/users
     * @access  public
     */
    public function getAllClasses();

    /**
     * Get User By ID
     *
     * @param   integer     $id
     *
     * @method  GET api/users/{id}
     * @access  public
     */
    public function getClassesById($id);

    /**
     * Get User By ID
     *
     * @param   integer     $id
     *
     * @method  GET api/users/{id}
     * @access  public
     */
    public function deleteClassById($id);

}
