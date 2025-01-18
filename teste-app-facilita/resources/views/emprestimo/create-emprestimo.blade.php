<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Empréstimo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastrar Empréstimo</h2>

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
        
        <form action="{{ route('emprestimos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="usuario_id">Usuário</label>
                <select class="form-control" id="usuario_id" name="usuario_id" required>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="livro_id">Livro</label>
                <select class="form-control" id="livro_id" name="livro_id" required>
                    @foreach($livros as $livro)
                        <option value="{{ $livro->id }}">{{ $livro->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="data_emprestimo">Data de Empréstimo</label>
                <input type="date" class="form-control" id="data_emprestimo" name="data_emprestimo" required>
            </div>
            <div class="form-group">
                <label for="data_devolucao">Data de Devolução</label>
                <input type="date" class="form-control" id="data_devolucao" name="data_devolucao" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="{{ route('emprestimos.listar') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>
</html>
