<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use pagination;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::User();
        
        if($user->admin){

            $student = User::paginate(1);
            
            return view('admin/students/index', ['student' => $student]);
        }else{
            
            return view('students/profile', ['student' => $user]);
        }
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

    public function update(Request $request, $id) {
        $p = User::findOrFail($id);
        $p->name = $request->input('name');
        $p->cpf = $request->input('cpf');
        $p->RG = $request->input('RG');
        $p->address = $request->input('address');
        $p->cellphone = $request->input('cellphone');
        $p->email = $request->input('email');
        
        if ($p->save()) {
            \Session::flash('status', 'Seus dados foram atualizado com sucesso!');
            return redirect('student');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar seus dados.');
            return view('student');
        }
    }


}