@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cursos!
                    <a href="/course/create" class="float-right btn btn-success">Novo Curso</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>ementa</th>
                            <th>qtdAlunos</th>                            
                        </tr>
                        @foreach($course as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->nome }}</td>
                                <td>{{ $p->ementa }}</td>
                                <td>{{ $p->qtdAlunos }}</td>
                                <td>
                                    <a href="/course/{{ $p->id }}/edit" class="btn btn-warning">Editar</a>
                                    <a href="/course/{{ $p->id }}/delete" class="btn btn-danger">Remover</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
