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
                            <th>Nome</th>
                            <th>Ementa</th>
                            <th>Quantidade de Alunos</th>                            
                        </tr>
                        @foreach($course as $p)
                            <tr>
                                <td>{{ $p->nome }}</td>
                                <td>{{ $p->ementa }}</td>
                                <td>{{ $p->qtdAlunos }}</td>
                                <td>
                                    <a href="" class="btn btn-warning">matricular-se</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $course->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
