@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h1 class="text-center">Professores</h1> 
            <a class="btn btn-info" href="{{url('teachers/create')}}" style="height: 40px; width: 40px;">+</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">CPF</th>
                <th scope="col">Disciplina</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $teachers as $t )
                    <tr>
                        <th scope="row">{{$t->name}}</th>
                        <td>{{$t->email}}</td>
                        <td>{{$t->cpf}}</td>
                        <td>{{$t->discipline}}</td>
                    </tr>
                @endforeach

            </tbody>
          </table>

    </div>
@endsection