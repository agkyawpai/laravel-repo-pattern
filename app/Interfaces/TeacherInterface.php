<?php

namespace App\Interfaces;


interface TeacherInterface
{
    /**
     * Get all users
     *
     * @method  GET api/users
     * @access  public
     */
    public function getAllTeachers();

    /**
     * Get User By ID
     *
     * @param   integer     $id
     *
     * @method  GET api/users/{id}
     * @access  public
     */
    public function getTeachersById($id);

    /**
     * Get User By ID
     *
     * @param   integer     $id
     *
     * @method  GET api/users/{id}
     * @access  public
     */
    public function deleteTeacherById($id);

}
