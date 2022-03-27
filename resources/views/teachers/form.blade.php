@extends('layouts.app')

@section('content')

    <div class="container">
        
        <form action="{{ url('/teachers') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nome</label>
                <input required type="text" name="name" class="form-control" id="name" placeholder="Nome">
            </div>

            <div class="form-group">
                <label for="email">Email </label>
                <input required type="email" name="email" class="form-control" id="email" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input required type="password" name="password" class="form-control" id="password" placeholder="Senha">
            </div>

            <div class="form-group">
                <label for="password">Confirmar senha</label>
                <input required type="password" name="confirmpassword" class="form-control" id="password" placeholder="Confirmar senha">
            </div>

            <div class="form-group">
                <label for="discipline">Disciplina</label>
                <select required type="discipline" name="discipline" class="form-control" id="discipline">
                    <option>Selecione uma disciplina</option>
                    <option value="Inglês">Inglês</option>
                    <option value="Matemática">Matemática</option>
                    <option value="Lógica">Lógica</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

    </div>


@endsection