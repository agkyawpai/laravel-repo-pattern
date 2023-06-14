<?php

namespace App\Interfaces;


interface StudentInterface
{
    /**
     * Get all students
     *
     * @method
     * @access  public
     */
    public function getAllStudents();

    /**
     * Get Student By ID
     *
     * @param   integer     $id
     *
     * @method
     * @access  public
     */
    public function getStudentById($id);

    /**
     * Delete User By ID
     *
     * @param   integer     $id
     *
     * @method
     * @access  public
     */
    public function deleteStudentById($id);

    /**
     * Show Detail of Students By ID
     *
     * @param   integer     $id
     *
     * @method
     * @access  public
     */
    public function showStudentDetail($id);

}
