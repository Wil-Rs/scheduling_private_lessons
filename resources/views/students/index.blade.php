@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{url('students/search')}}" method="POST">
            @csrf
            <div class="row d-flex">
                <div class="col-sm-12">
                    <input type="search" name="search" class="w-75" placeholder="filtrar por nome ou id" style="height: 40px; padding-left: 10px;"> 
                    <button type="submit" class="btn btn-info" style="height: 40px; width: 40px;">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
                {{-- <div class="col-sm-2"> --}}
                {{-- </div> --}}
            </div>
        </form>

        <div class="d-flex justify-content-between mt-5">
            <h1 class="text-center">Alunos</h1> 
            <a class="btn btn-info" href="{{url('students/create')}}" style="height: 40px; width: 40px;">+</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Nascimento</th>
                <th scope="col">ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $students as $s )
                    <tr>
                        <th scope="row">{{$s->name}}</th>
                        <td>{{$s->birth_date}}</td>
                        <td class="d-flex justify-content-between">
                            <a href="{{ url('students') }}/{{$s->id}}/edit" class="btn btn-warning" title="editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <form action="{{ url('students') }}/{{$s->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
          </table>

    </div>
@endsection