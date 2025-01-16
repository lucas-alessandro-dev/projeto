<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Livros</h2>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('livro.update', $livro->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $livro->nome }}" required>
            </div>

            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="autor" class="form-control" id="autor" name="autor" value="{{ $livro->autor }}" required>
            </div>

            <div class="form-group">
                <label for="numero_registro">Número de Registro</label>
                <input type="text" class="form-control" id="numero_registro" name="numero_registro" value="{{ $livro->numero_registro }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('livro.create') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>