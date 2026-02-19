<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cards = [
            "Teachers" =>[
                'title' =>"Profesores",
                'description' =>"Listado de profesores",
                'img' =>"/img/teachers.png",
                'action' =>"/teachers"
            ],
            "Students" =>[
                'title' =>"Estudiantes",
                'description' =>"MOstrar estudiantes del sistema",
                'img' =>"/img/students.png",
                'action' =>"/students"
            ],
            "users"=>[
                'title' =>"Usuarios",
                'description' =>"Mostrar usuarios del sistema",
                'img' =>"/img/users.png",
                'action' =>"/users"
            ],
            "projects"=>[
                'title' =>"Proyectos",
                'description' =>"Mostrar los proyectos del sistema",
                'img' =>"/img/projects.png",
                'action' =>"/projects"
            ]
        ];
        return Inertia::render('Main', ['cards' => $cards]);
        //
    }
}
