<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function getTeachers(){
        $teachers = User::role('teacher')->get();
        $fields = User::fieldLabels();
        return Inertia::render('Teachers.index', ['rows' => $teachers, 'fields' =>$fields]);
    }

    public function getStudents(){
        $students = User::role('student')->get();
        $fields = User::fieldLabels();
        return Inertia::render('Students.index', ['rows' => $students, 'fields' =>$fields]);
    }
}
