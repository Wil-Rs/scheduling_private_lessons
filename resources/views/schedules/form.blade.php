@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Request::is('*/edit'))
            <form action="{{ url('/schedules') }}/{{$schedule->id}}" method="POST" class="needs-validation">
            @method('put')
        @else
            <form action="{{ url('/schedules') }}" method="POST" class="needs-validation">
        @endif
            @csrf

            <div class="form-group">
                <label for="teacher_id">Professor</label>
                <select required type="text" name="teacher_id" value="{{Request::is('*/edit') ? $schedule->teacher_id : old('teacher_id')}}" class="form-control {{ $errors->has('teacher_id') ? 'is-invalid' : '' }}" id="teacher_id" placeholder="Nome">
                    <option>Selecione um professor</option>
                    @foreach( $teachers as $t )
                        <option {{ Request::is('*/edit') ? ($schedule->teacher_id == $t->id ? 'selected' : '') : '' }} value="{{$t->id}}">{{$t->name}}</option>
                    @endforeach
                </select>
                @if( $errors->has('teacher_id') )
                    <div class="invalid-feedback">
                        {{ $errors->first('teacher_id') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="student_id">Aluno</label>
                <select required type="text" name="student_id" value="{{Request::is('*/edit') ? $schedule->student_id : old('student_id')}}" class="form-control {{ $errors->has('student_id') ? 'is-invalid' : '' }}" id="student_id" placeholder="Nome">
                    <option>Selecione um Aluno</option>
                    @foreach( $students as $s )
                        <option  {{ Request::is('*/edit') ? ($schedule->student_id == $s->id ? 'selected' : '') : '' }} value="{{$s->id}}">{{$s->name}}</option>
                    @endforeach
                </select>
                @if( $errors->has('student_id') )
                    <div class="invalid-feedback">
                        {{ $errors->first('student_id') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="date_time_schedule">Data e hora da aula</label>
                <input required type="datetime-local" name="date_time_schedule" value="{{Request::is('*/edit') ? $schedule->date_time_schedule : old('date_time_schedule')}}" class="form-control {{ $errors->has('date_time_schedule') ? 'is-invalid' : '' }}" id="date_time_schedule" placeholder="Nome">
                @if( $errors->has('date_time_schedule') )
                    <div class="invalid-feedback">
                        {{ $errors->first('date_time_schedule') }}
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

        @if ($errors->any())
            <div class="alert alert-danger mt-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>


@endsection