<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Student;
use App\course;

class StudentController extends Controller
{

    public function index()
    {

        $city = DB::table('users')
            ->select('users.id','users.name' ,'users.cpf', 'users.RG', 'users.endereço', 'users.celular', 'users.email')->get();

        return view('students/index', ['students' => $students]);
    }

    public function create() 
    {
        $Student = Student::all();
        return view('student/new', ['student' => $Student]);
    }

    public function store(Request $request) 
    {
        $p = new student;
        $p->nome = $request->input('nome');
        $p->cpf = $request->input('cpf');
        $p->rg = $request->input('rg');
        $p->endereco = $request->input('endereco');
        $p->rg = $request->input('celular');
        
        if ($p->save()) {
            \Session::flash('status', 'Estudante criado com sucesso!');
            return redirect('/student');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o estudante!');
            return view('student.new');
        }
    }


}