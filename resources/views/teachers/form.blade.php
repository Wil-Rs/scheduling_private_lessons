@extends('layouts.app')

@section('content')

    <div class="container">
        @if(Request::is('*/edit'))
            <form action="{{ url('/teachers') }}/{{$teacher->id}}" method="POST" class="needs-validation">
            @method('put')
        @else
            <form action="{{ url('/teachers') }}" method="POST" class="needs-validation">
        @endif
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input required type="text" name="name" value="{{ Request::is('*/edit') ? $teacher->name : old('name')}}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Nome">
                @if( $errors->has('name') )
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email </label>
                <input required type="email" name="email" value="{{ Request::is('*/edit') ? $teacher->email : old('email')}}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Email">
                @if( $errors->has('email') )
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="cpf">CPF </label>
                <input required type="text" name="cpf" value="{{ Request::is('*/edit') ? $teacher->cpf :  old('cpf')}}" class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}" id="cpf" placeholder="CPF">
                @if( $errors->has('cpf') )
                    <div class="invalid-feedback">
                        {{ $errors->first('cpf') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input required type="password" name="password" value="{{old('password')}}" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" placeholder="Senha">
                @if( $errors->has('password') )
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Confirmar senha</label>
                <input required type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" placeholder="Confirmar senha">
                @if( $errors->has('password') )
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="discipline">Disciplina</label>
                <select required type="discipline" name="discipline" value="{{ Request::is('*/edit') ? $teacher->discipline :  old('discipline')}}" class="form-control {{ $errors->has('discipline') ? 'is-invalid' : '' }}" id="discipline">
                    <option>Selecione uma disciplina</option>
                    <option {{ Request::is('*/edit') ? ($teacher->discipline == 'Inglês' ? 'selected' : '') : '' }} value="Inglês">Inglês</option>
                    <option {{ Request::is('*/edit') ? ($teacher->discipline == 'Matemática' ? 'selected' : '') : '' }} value="Matemática">Matemática</option>
                    <option {{ Request::is('*/edit') ? ($teacher->discipline == 'Lógica' ? 'selected' : '') : '' }} value="Lógica">Lógica</option>
                </select>
                @if( $errors->has('discipline') )
                    <div class="invalid-feedback">
                        {{ $errors->first('discipline') }}
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