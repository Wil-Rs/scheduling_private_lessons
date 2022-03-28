@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="{{url('schedules/search')}}" method="POST">
            @csrf
            <div class="row d-flex">
                <div class="col-sm-12">
                    <input type="search" name="search" class="w-75" placeholder="filtrar por código do agendamento ou id do professor" style="height: 40px; padding-left: 10px;"> 
                    <button type="submit" class="btn btn-info" style="height: 40px; width: 40px;">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </div>
                {{-- <div class="col-sm-2"> --}}
                {{-- </div> --}}
            </div>
        </form>

        <div class="d-flex justify-content-between">
            <h1 class="text-center">Agendamentos</h1> 
            <a class="btn btn-info" href="{{url('schedules/create')}}" style="height: 40px; width: 40px;">+</a>
        </div>

        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">código</th>
                <th scope="col">Data agendada</th>
                <th scope="col">Professor</th>
                <th scope="col">Aluno</th>
                <th scope="col">ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $schedules as $s )
                    <tr>
                        <th scope="row">{{$s->id}}</th>
                        <th scope="row">{{$s->date_time_schedule}}</th>
                        <td>{{$s->teacher->name}}</td>
                        <td>{{$s->student->name}}</td>
                        <td class="d-flex justify-content-between">
                            <a href="{{ url('schedules') }}/{{$s->id}}/edit" class="btn btn-warning" title="editar"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <form action="{{ url('schedules') }}/{{$s->id}}" method="POST">
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