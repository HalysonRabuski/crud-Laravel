<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Student;
use App\Course;
use App\User;
class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $student = User::all();
            
        return view('students/index', ['student' => $student]);
    }

    public function create() 
    {
        $Student = User::all();
        return view('student/new', ['student' => $Student]);
    }

    public function store(Request $request) 
    {
        $p = new student;
        $p->nome = $request->input('nome');
        $p->cpf = $request->input('cpf');
        $p->rg = $request->input('rg');
        $p->endereco = $request->input('address');
        $p->rg = $request->input('cellphone');
        
        if ($p->save()) {
            \Session::flash('status', 'Estudante criado com sucesso!');
            return redirect('/student');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o estudante!');
            return view('student.new');
        }
    }

    public function destroy($id)
     {
        $p = User::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Estudante excluído com sucesso.');
        return redirect('student');
    }


}