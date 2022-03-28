@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Request::is('*/edit'))
            <form action="{{ url('/students') }}/{{$student->id}}" method="POST" class="needs-validation">
            @method('put')
        @else
            <form action="{{ url('/students') }}" method="POST" class="needs-validation">
        @endif
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input required type="text" name="name" value="{{Request::is('*/edit') ? $student->name : old('name')}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Nome">
                @if( $errors->has('name') )
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="birth_date">Nascimento </label>
                <input required type="date" name="birth_date" value="{{Request::is('*/edit') ? $student->birth_date : old('birth_date')}}" class="form-control {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" id="birth_date" placeholder="Data de nascimento">
                @if( $errors->has('birth_date') )
                    <div class="invalid-feedback">
                        {{ $errors->first('birth_date') }}
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