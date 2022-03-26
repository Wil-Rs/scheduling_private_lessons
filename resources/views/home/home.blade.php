@extends('layouts.app')

@section('content')

   

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Cadastro Professor</h5>
                            {{-- <p class="card-text">Com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p> --}}
                            <a href="#" class="btn btn-primary w-100">Acessar</a>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Cadastro Aluno</h5>
                            {{-- <p class="card-text">Com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p> --}}
                            <a href="#" class="btn btn-primary w-100">Acessar</a>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Agendamentos</h5>
                            {{-- <p class="card-text">Com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p> --}}
                            <a href="#" class="btn btn-primary w-100">Acessar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mt-3">
                <h1 class="text-center">Dashboard</h1>

                <ol class="list-group list-group-numbered">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Professores cadastrados</div>
                      </div>
                      <span class="badge bg-primary rounded-pill">14</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">Alunos cadastrados</div>
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">Agendamentos cadastrados</div>
                        </div>
                        <span class="badge bg-primary rounded-pill">14</span>
                    </li>
                </ol>

            </div>
        </div>
    </div>

@endsection