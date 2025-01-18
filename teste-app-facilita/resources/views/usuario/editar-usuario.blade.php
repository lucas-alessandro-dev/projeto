<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Usuário</h2>
        
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

        <form action="{{ route('usuario.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $usuario->nome }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}" required>
            </div>

            <div class="form-group">
                <label for="numero_cadastro">Número de Cadastro</label>
                <input type="text" class="form-control" id="numero_cadastro" name="numero_cadastro" value="{{ $usuario->numero_cadastro }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('usuario.lista') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>
</html>