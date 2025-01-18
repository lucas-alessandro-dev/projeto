<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empréstimo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Empréstimo</h2>
        
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

        <form action="{{ route('emprestimos.update', $emprestimo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="usuario_id">Usuário</label>
                <select class="form-control" id="usuario_id" name="usuario_id" required>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $emprestimo->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="livro_id">Livro</label>
                <select class="form-control" id="livro_id" name="livro_id" required>
                    @foreach($livros as $livro)
                        <option value="{{ $livro->id }}" {{ $emprestimo->livro_id == $livro->id ? 'selected' : '' }}>{{ $livro->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="data_emprestimo">Data de Empréstimo</label>
                <input type="date" class="form-control" id="data_emprestimo" name="data_emprestimo" value="{{ $emprestimo->data_emprestimo }}" required>
            </div>
            <div class="form-group">
                <label for="data_devolucao">Data de Devolução</label>
                <input type="date" class="form-control" id="data_devolucao" name="data_devolucao" value="{{ $emprestimo->data_devolucao }}">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Em Andamento" {{ $emprestimo->status == 'Em Andamento' ? 'selected' : '' }}>Em Andamento</option>
                    <option value="Devolvido" {{ $emprestimo->status == 'Devolvido' ? 'selected' : '' }}>Devolvido</option>
                    <option value="Atrasado" {{ $emprestimo->status == 'Atrasado' ? 'selected' : '' }}>Atrasado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('emprestimos.listar') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>