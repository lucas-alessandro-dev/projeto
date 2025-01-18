<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Cadastro de Usuário</h2>

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

            <form action="{{ url('/cadastrar-usuario') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="numero_cadastro">Número de Cadastro</label>
                    <input type="text" class="form-control" id="numero_cadastro" name="numero_cadastro" required>
                </div>
                <div class="form-group d-flex "> 
                    <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
                    <a href="{{ route('usuario.lista') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
