<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SisRH</title>
    <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-primary">
    <div class="bg-white container p-5 position-absolute top-50 start-50 translate-middle rounded-4 shadow" style="max-width: 400px">
        <img src="{{ asset('images/logo_color.png') }}" alt="SisRH" height="40" class="d-block mx-auto mb-4">

        @isset($_GET['msg'])
            <div class="alert alert-danger text-center p-2">Área Restrista. Realize o login para acessar.</div>

        @endisset

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-warning text-center p-2">{{ $error }}</div>
            @endforeach
        @endif

        @if (Session::get('erro'))
            <div class="alert alert-warning text-center p-2">{{ Session()->get('erro') }}</div>

        @endif

        <form action="{{ route('login.auth') }}" class="row g-3" method="POST">
            @csrf
            <div>
                <label for="email" class="form-label fs-5">E-mail</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg" required>
            </div>
            <div>
                <label for="password" class="form-label fs-5">Senha</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg" required>
            </div>

                <button type="submit" class="btn btn-primary btn-log">Entrar</button>

        </form>
    </div>
</body>
</html>
