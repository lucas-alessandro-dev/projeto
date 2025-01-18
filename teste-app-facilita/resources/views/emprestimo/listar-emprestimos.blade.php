<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empréstimos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
    <div class="container mt-5">
        <h2 class="text-center">Lista de Empréstimos</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="mt-4">
            <form action="{{ route('emprestimos.listar') }}" method="GET" class="form-inline">
                <div class="form-group mb-2">
                    <label for="genero" class="mr-2">Filtrar por Gênero:</label>
                    <select name="genero" id="genero" class="form-control">
                        <option value="">Todos</option>
                        @foreach($generos as $genero)
                            <option value="{{ $genero->id }}" {{ request('genero') == $genero->id ? 'selected' : '' }}>{{ $genero->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2 ml-2">Filtrar</button>
            </form>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th>Livro</th>
                    <th>Gênero</th>
                    <th>Data de Empréstimo</th>
                    <th>Data de Devolução</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody></tbody>
                @foreach($emprestimos as $emprestimo)
                    <tr>
                        <td>{{ $emprestimo->usuario->nome }}</td>
                        <td>{{ $emprestimo->livro->nome }}</td>
                        <td>{{ $emprestimo->genero->nome }}</td>
                        <td>{{ $emprestimo->data_emprestimo }}</td>
                        <td>{{ $emprestimo->data_devolucao }}</td>
                        <td>{{ $emprestimo->status }}</td>
                        <td>
                            <a href="{{ route('emprestimos.edit', $emprestimo->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('emprestimos.destroy', $emprestimo->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center mt-3">
            <a href="{{ route('emprestimos.index') }}" class="btn btn-success">Adicionar Empréstimo</a>
            <a href="{{ route('livro.lista') }}" class="btn btn-primary">Lista de Livros</a>
            <a href="{{ route('usuario.lista') }}" class="btn btn-primary">Lista de Usuários</a>
        </div>
    </div>
</body>
</html>
