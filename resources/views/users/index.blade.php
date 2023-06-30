@extends('users.template')
@section('content')
    <div class="container">
        <h1>Formulário de Cadastro de Usuário</h1>
        @include('users.includes.alerts')
        <form id="user-form" action="{{ route('users.post') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nome" required value="{{old('name')}}">
            <input type="email" name="email" placeholder="E-mail" required value="{{old('email')}}">
            <input type="tel" name="password" placeholder="Password" required value="password">
            <input type="tel" name="phone[]" placeholder="Telefone" required>
            <div id="form-tel">
            </div>
            <a href="#" onclick="addField()">Adicionar Telemovel</a>
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
            <tbody id="user-list">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->getId() }}</td>
                        <td>{{ $user->getName() }}</td>
                        <td>{{ $user->getEmail() }}</td>
                        <td>
                            @foreach ($phones->getPhones($user->getId()) as $phone)
                                {{ $phone->getPhone() }}
                            @endforeach
                        </td>
                        <td>
                            <button class="delete-btn" onclick="confirmRemoval({{ $user->getId() }})">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
        function confirmRemoval(id) {
            Swal.fire({
                title: 'Confirmar remoção',
                text: 'Deseja remover este registro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim',
                cancelButtonText: 'Não'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/users/destroy/"+id
                }
            });
        }
    </script>
@endsection