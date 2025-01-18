<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Livros</h1>
        
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
            <form action="{{ route('livro.lista') }}" method="GET" class="form-inline">
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
                    <th>Nome</th>
                    <th>Autor</th>
                    <th>Gênero</th>
                    <th>Situação</th>
                    <th>Número de registro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livros as $livro)
                <tr>
                    <td>{{ $livro->nome }}</td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->genero->nome }}</td>
                    <td>{{ $livro->situacao }}</td>
                    <td>{{ $livro->numero_registro }}</td>
                    <td>
                        <a href="{{ route('livro.edit', $livro->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('livro.destroy', $livro->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('livro.create') }}" class="btn btn-success">Adicionar Livro</a>
        <a href="{{ route('emprestimos.listar') }}" class="btn btn-primary">Voltar</a>
    </div>
</body>
</html>
