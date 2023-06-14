<?php

namespace App\Interfaces;


interface SchoolInterface
{
    /**
     * Get all users
     *
     * @method  GET api/users
     * @access  public
     */
    public function getAllSchools();

    /**
     * Get User By ID
     *
     * @param   integer     $id
     *
     * @method  GET api/users/{id}
     * @access  public
     */
    public function getSchoolsById($id);

    /**
     * Get User By ID
     *
     * @param   integer     $id
     *
     * @method  GET api/users/{id}
     * @access  public
     */
    public function deleteSchoolById($id);

}
