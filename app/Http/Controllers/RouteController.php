<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Student;
class RouteController extends Controller
{


    public function index()
    {
        $posts = Student::all();
        $courses = Course::all();
        $enrolled_students = null;
        $course = Course::find(2);
        
        if ($course) {
            $enrolled_students = $course->students;
        }

        return view('index', compact('posts', 'courses', 'enrolled_students'));
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function formations(){
        $courses = Course::all();
        $courses = $courses->sortBy('name');
        return view('cours',compact('courses'));
    }
    public function etudiants(){
        return view('index');
    }
    
    public function finances(){
        return view('finances');
    }
    public function ajouter(){
        return view('index');
    }
    public function math(){
        return view ('math');
    }
    public function education(){
        return view('educationFinanciere');
    }

}
