<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Cadastro de Livros</h2>

            @if(session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                {{ session('error') }}
                </div>
            @endif

            <form action="{{ url('/livros') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="autor" class="form-control" id="autor" name="autor" required>
                </div>
                <div class="form-group">
                    <label for="numero_registro">Número de registro</label>
                    <input type="text" class="form-control" id="numero_registro" name="numero_registro" required>
                </div>
                <div class="form-group">
                    <label for="genero_id">Gênero</label>
                    <select class="form-control" id="genero_id" name="genero_id" required>
                        @foreach($generos as $genero)
                            <option value="{{ $genero->id }}">{{ $genero->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="situacao">Situação</label>
                    <select class="form-control" id="situacao" name="situacao" required>
                        <option value="disponivel">Disponível</option>
                        <option value="emprestado">Emprestado</option>
                    </select>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
                    <a href="{{ route('emprestimos.listar') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
