<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro | SecureApp</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    >
</head>
<body class="bg-light">
    <main class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
        <section class="card border-0 shadow-sm" style="width: 100%; max-width: 480px;">
            <div class="card-body p-4 p-md-5">
                <div class="text-center mb-4">
                    <h1 class="h3 mb-2">Crear cuenta</h1>
                    <p class="text-secondary mb-0">Completa los datos para registrarte.</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Revisa la información ingresada.</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            autocomplete="name"
                            required
                            autofocus
                        >
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="username"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            name="password"
                            autocomplete="new-password"
                            required
                        >
                        <div class="form-text">Mínimo 8 caracteres.</div>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                        <input
                            type="password"
                            class="form-control"
                            id="password_confirmation"
                            name="password_confirmation"
                            autocomplete="new-password"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Registrarme</button>
                </form>

                <p class="text-center text-secondary mt-4 mb-0">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}">Inicia sesión</a>
                </p>
            </div>
        </section>
    </main>
</body>
</html>
