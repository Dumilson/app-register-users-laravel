@extends('users.template')
@section('content')
    <div class="container">
        <h1>Formulário de Cadastro de Usuário</h1>
        @include('users.includes.alerts')
        <form id="user-form">
            <input type="text" id="name" placeholder="Nome" required>
            <input type="email" id="email" placeholder="E-mail" required>
            <input type="tel" id="phone" placeholder="Telefone" required>
            <input type="submit" value="Cadastrar">
        </form>

        <table id="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody id="user-list"></tbody>
        </table>
    </div>
@endsection
