<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | SecureApp</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous"
    >
</head>
<body class="bg-light">
    <nav class="navbar bg-white border-bottom">
        <div class="container py-2">
            <span class="navbar-brand fw-semibold">SecureApp</span>

            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Cerrar sesión</button>
            </form>
        </div>
    </nav>

    <main class="container py-5">
        <section class="card border-0 shadow-sm mx-auto" style="max-width: 720px;">
            <div class="card-body p-4 p-md-5">
                <span class="badge text-bg-success mb-3">Sesión activa</span>
                <h1 class="h2">Bienvenido, {{ auth()->user()->name }}</h1>
                <p class="text-secondary mb-4">Has ingresado correctamente al dashboard protegido.</p>

                <div class="border rounded-3 bg-light p-3">
                    <div class="small text-secondary">Correo electrónico</div>
                    <div class="fw-semibold">{{ auth()->user()->email }}</div>
                </div>

                <p class="small text-secondary mt-4 mb-0">
                    Esta página solo puede verse cuando existe una sesión autenticada.
                </p>
            </div>
        </section>
    </main>

    <script>
        let logoutSubmitted = false;
        const logoutForm = document.querySelector('#logout-form');

        logoutForm.addEventListener('submit', () => {
            logoutSubmitted = true;
        });

        window.addEventListener('pagehide', () => {
            if (logoutSubmitted) {
                return;
            }

            const data = new FormData();
            data.append('_token', @json(csrf_token()));
            navigator.sendBeacon(@json(route('logout')), data);
        });

        window.addEventListener('pageshow', (event) => {
            if (event.persisted) {
                window.location.reload();
            }
        });
    </script>
</body>
</html>
