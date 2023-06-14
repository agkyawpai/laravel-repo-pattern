<?php

namespace App\Providers;

use App\Interfaces\SchoolInterface;
use App\Interfaces\StudentInterface;
use App\Interfaces\TeacherInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserInterface;
use App\Interfaces\ClassInterface;
use App\Repositories\ClassRepository;
use App\Repositories\SchoolRepository;
use App\Repositories\StudentRepository;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
        ClassInterface::class => ClassRepository::class,
        StudentInterface::class => StudentRepository::class,
        SchoolInterface::class => SchoolRepository::class,
        TeacherInterface::class => TeacherRepository::class,
    ];
    public function register()
    {
        // Register Interface and Repository in here
        // You must place Interface in first place
        // If you dont, the Repository will not get readed.
        $this->app->bind(ClassInterface::class, ClassRepository::class);
        $this->app->bind(StudentInterface::class, StudentRepository::class);
        $this->app->bind(SchoolInterface::class, SchoolRepository::class);
        $this->app->bind(TeacherInterface::class, TeacherRepository::class);
    }
}
