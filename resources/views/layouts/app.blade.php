<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Gestión de Productos')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Asegura que el contenido ocupe al menos el alto completo de la pantalla */
}

.container {
    flex: 1; /* Hace que el contenido crezca y deje espacio al footer */
}

.footer {
    background-color: #343a40;
    color: white;
    text-align: center;
    padding: 10px;
    width: 100%;
    position: relative; /* Cambia de fixed a relative */
    bottom: 0;
}

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('productos.index') }}">Tienda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('proveedores.index') }}">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('entradas.index') }}">Compras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('salidas.index') }}">Ventas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido dinámico -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; {{ date('Y') }} Tienda - Gestión de Productos</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
