<?php

namespace App\Http\Controllers\API;

use App\DBTransactions\Student\SaveStudent;
use App\DBTransactions\Teacher\SaveTeacher;
use App\DBTransactions\ClassTest\SaveClass;
use App\DBTransactions\ClassTest\UpdateClass;
use App\DBTransactions\School\SaveSchool;
use App\DBTransactions\School\UpdateSchool;
use App\DBTransactions\Student\UpdateStudent;
use App\DBTransactions\Teacher\UpdateTeacher;
use App\Http\Controllers\Controller;
use App\Interfaces\ClassInterface;
use App\Interfaces\SchoolInterface;
use App\Interfaces\StudentInterface;
use App\Interfaces\TeacherInterface;
use App\Traits\ResponseAPI;
use Exception;
use Illuminate\Http\Request;

class AungKyawPaingController extends Controller
{
    use ResponseAPI;
    protected $studentInterface;
    protected $teacherInterface;
    protected $classInterface;
    protected $schoolInterface;

    public function __construct(
        StudentInterface $studentInterface,
        TeacherInterface $teacherInterface,
        ClassInterface $classInterface,
        SchoolInterface $schoolInterface
    ) {
        $this->studentInterface = $studentInterface;
        $this->teacherInterface = $teacherInterface;
        $this->classInterface = $classInterface;
        $this->schoolInterface = $schoolInterface;
    }

    //method to save multiple data
    public function store(Request $request)
    {
        try {
            //get data
            if (
                $request->school_data ||
                $request->student_data ||
                $request->class_data ||
                $request->teacher_data
            ) {
                if ($request->school_data) {    //check data exists or not
                    $save = new SaveSchool($request['school_data']);    //if exists, save data
                    $saveSchool = $save->executeProcess();
                    if ($saveSchool) {
                        $results[] = $this->success("School saved successfully", $saveSchool);
                    } else {
                        $results[] = $this->error("Failed to save school", 404);
                    }
                }
                if ($request->student_data) {   //check data exists or not
                    $save = new SaveStudent($request['student_data']);  //if exists, save data
                    $saveStudent = $save->executeProcess();
                    if ($saveStudent) {
                        $results[] = $this->success("Student saved successfully", $saveStudent);
                    } else {
                        $results[] = $this->error("Failed to save student", 404);
                    }
                }
                if ($request->class_data) { //check data exists or not
                    $save = new SaveClass($request['class_data']);  //if exists, save data
                    $saveClass = $save->executeProcess();
                    if ($saveClass) {
                        $results[] = $this->success("Class saved successfully", $saveClass);
                    } else {
                        $results[] = $this->error("Failed to save class", 404);
                    }
                }
                if ($request->teacher_data) {   //check data exists or not
                    $save = new SaveTeacher($request['teacher_data']);  //if exists, save data
                    $saveTeacher = $save->executeProcess();
                    if ($saveTeacher) {
                        $results[] = $this->success("Teacher saved successfully", $saveTeacher);
                    } else {
                        $results[] = $this->error("Failed to save teacher", 404);
                    }
                }
                return $results;    //show all error,success messages
            } else {
                return response()->json(['message' => 'Invalid data provided'], 400);
            }
        } catch (Exception $e) {
            $results[] = $this->error($e->getMessage(), 404);
            return $results;
        }
    }

    //method to update multiple data
    public function update(Request $request, $id)
    {
        try {
            //get data from request
            if (
                $request->school_data ||
                $request->student_data ||
                $request->class_data ||
                $request->teacher_data
            ) {
                if ($request->school_data) {    //check data exists or not
                    $school = $this->schoolInterface->getSchoolsById($id); //get id to update data
                    if (!$school) {
                        return $this->error("Schools not found", 404);
                    }
                    $update = new UpdateSchool($request['school_data'], $id);   //update data
                    $updatedSchool = $update->executeProcess();
                    if ($updatedSchool) {
                        $results[] = $this->success("School updated successfully", $updatedSchool);
                    } else {
                        $results[] = $this->error("Error updating school", 404);
                    }
                }
                if ($request->student_data) {   //check data exists or not
                    $student = $this->studentInterface->getStudentById($id);    //get id to update data
                    if (!$student) {
                        return $this->error("Student not found", 404);
                    }
                    $update = new UpdateStudent($request['student_data'], $id);   //update data
                    $updatedStudent = $update->executeProcess();
                    if ($updatedStudent) {
                        $results[] = $this->success("Student updated successfully", $updatedStudent);
                    } else {
                        $results[] = $this->error("Error updating student", 404);
                    }
                }
                if ($request->class_data) {     //check data exists or not
                    $class = $this->classInterface->getClassesById($id);    //get id to update data
                    if (!$class) {
                        return $this->error("Class not found", 404);
                    }
                    $update = new UpdateClass($request['class_data'], $id);   //update data
                    $updatedClass = $update->executeProcess();
                    if ($updatedClass) {
                        $results[] = $this->success("Class updated successfully", $updatedClass);
                    } else {
                        $results[] = $this->error("Error updating class", 404);
                    }
                }
                if ($request->teacher_data) {   //check data exists or not
                    $teacher = $this->teacherInterface->getTeachersById($id);   //get id to update data
                    if (!$teacher) {
                        return $this->error("Teacher not found", 404);
                    }
                    $update = new UpdateTeacher($request['teacher_data'], $id);   //update data
                    $updatedTeacher = $update->executeProcess();
                    if ($updatedTeacher) {
                        $results[] = $this->success("Teacher updated successfully", $updatedTeacher);
                    } else {
                        $results[] = $this->error("Error updating teacher", 404);
                    }
                }
                return $results;    //show all error,success messages
            } else {
                return response()->json(['message' => 'Invalid data provided'], 400);
            }
        } catch (Exception $e) {
            $results[] = $this->error($e->getMessage(), 404);
            return $results;
        }
    }

    //method to show details by id
    public function show(Request $request)
    {
        try {
            //get data from request
            if (
                $request->school_id ||
                $request->student_id ||
                $request->class_id ||
                $request->teacher_id
            ) {
                if ($request->school_id) {    //check id exists or not
                    $school = $this->schoolInterface->getSchoolsById($request->school_id); //get id to show id
                    if (!$school) {
                        $results[] = $this->error("Schools not found", 404);
                    }
                    $results[] = $this->success("School id", $school);
                }
                if ($request->student_id) {   //check id exists or not
                    $student = $this->studentInterface->getStudentById($request->student_id);    //get id to show id
                    if (!$student) {
                        $results[] = $this->error("Student not found", 404);
                    }
                    $results[] = $this->success("Student id", $student);
                }
                if ($request->class_id) {     //check id exists or not
                    $class = $this->classInterface->getClassesById($request->class_id);    //get id to show id
                    if (!$class) {
                        $results[] = $this->error("Class not found", 404);
                    }
                    $results[] = $this->success("Class updated successfully", $class);
                }
                if ($request->teacher_id) {   //check id exists or not
                    $teacher = $this->teacherInterface->getTeachersById($request->teacher_id);   //get id to show id
                    if (!$teacher) {
                        $results[] = $this->error("Teacher not found", 404);
                    }
                    $results[] = $this->success("Teacher updated successfully", $teacher);
                }
                return $results;    //show all error,success messages
            } else {
                return response()->json(['message' => 'Invalid id provided'], 400);
            }
        } catch (Exception $e) {
            $results[] = $this->error($e->getMessage(), 404);
            return $results;
        }
    }

    //method to multiple data by id
    public function delete(Request $request)
    {
        try {
            //get data from request
            if (
                $request->school_id ||
                $request->student_id ||
                $request->class_id ||
                $request->teacher_id
            ) {
                if ($request->school_id) {    //check id exists or not
                    $school = $this->schoolInterface->deleteSchoolById($request->school_id); //call delete_byid method from interface
                    if (!$school) {
                        $results[] = $this->error("Schools not found", 404);
                    }
                    $results[] = $this->success("School deleted", $school);
                }
                if ($request->student_id) {   //check id exists or not
                    $student = $this->studentInterface->deleteStudentById($request->student_id);    //call delete_byid method from interface
                    if (!$student) {
                        $results[] = $this->error("Student not found", 404);
                    }
                    $results[] = $this->success("Student deleted", $student);
                }
                if ($request->class_id) {     //check id exists or not
                    $class = $this->classInterface->deleteClassById($request->class_id);    //call delete_byid method from interface
                    if (!$class) {
                        $results[] = $this->error("Class not found", 404);
                    }
                    $results[] = $this->success("Class deleted successfully", $class);
                }
                if ($request->teacher_id) {   //check id exists or not
                    $teacher = $this->teacherInterface->deleteTeacherById($request->teacher_id);   //call delete_byid method from interface
                    if (!$teacher) {
                        $results[] = $this->error("Teacher not found", 404);
                    }
                    $results[] = $this->success("Teacher deleted successfully", $teacher);
                }
                return $results;    //show all error,success messages
            } else {
                return response()->json(['message' => 'Invalid id provided'], 400);
            }
        } catch (Exception $e) {
            $results[] = $this->error($e->getMessage(), 404);
            return $results;
        }
    }

    //method to show detail of a student
    public function student_detail(Request $request)
    {
        try {
            if ($request->student_id) {
                $studentDetail = $this->studentInterface->showStudentDetail($request->student_id);
                if (!$studentDetail) {
                    $results[] = $this->error("Student not found", 404);
                }
                $results[] = $this->success("Student Detail", $studentDetail);
            }
            return $results;
        } catch (Exception $e) {
            $results[] = $this->error($e->getMessage(), 404);
            return $results;
        }
    }
}
