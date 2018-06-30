<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class CourseController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $course = Course::all();
            
        return view('courses/index', ['course' => $course]);
    }

    public function create() 
    {
        return view('courses/new');
    }

    public function store(Request $request) 
    {
        $p = new Course;
        $p->nome = $request->input('nome');
        $p->ementa = $request->input('ementa');
        $p->qtdAlunos = $request->input('qtdAlunos');
        
        if ($p->save()) {
            \Session::flash('status', 'Curso criado com sucesso!');
            return redirect('/course');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o curso!');
            return view('courses.new');
        }
    }

    public function destroy($id)
     {
        $p = Course::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Curso excluído com sucesso.');
        return redirect('course');
    }

    public function edit($id) {
        $course = Course::findOrFail($id);
        

        return view('courses.edit', ['course' => $course]);
    }

    public function update(Request $request, $id) {
        $p = Course::findOrFail($id);
        $p->nome = $request->input('nome');
        $p->ementa = $request->input('ementa');
        $p->qtdAlunos = $request->input('qtdAlunos');
        
        if ($p->save()) {
            \Session::flash('status', 'Curso atualizado com sucesso!');
            return redirect('/course');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o Curso.');
            return view('courses.edit', ['course' => $p]);
        }
    }


}