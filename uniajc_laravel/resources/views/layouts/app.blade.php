<!DOCTYPE html>
<html lang="es">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Panel</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 320px;
            height: 100vh;
            background: #111;
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 60px;
        }

        .menu-links {
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            padding: 20px;
            color: #ccc;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 10px;
            display: block;
        }

        .sidebar a:hover {
            background: #222;
            color: white;
        }

        /* Botón logout */
        .logout {
            margin-top: auto;
        }

        .logout button {
            width: 100%;
            padding: 10px;
            background: #dc3545;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout button:hover {
            background: #c82333;
        }

        /* Contenido */
        .content {
            flex: 1;
            padding: 40px;
            background: #f5f5f5;
        }

        .menu-title {
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 60px;
            letter-spacing: 4px;
        }

        .sidebar
    </style>
</head>

<body>

    <div class="sidebar">
        <h2 class="menu-title">MENÚ</h2>

        <div class="menu-links">
            <a href="{{ route('productos.index') }}"> Productos</a>
            <a href="{{ route('productos.create') }}"> Crear Producto</a>
            <a href="{{ route('movimientos.create') }}">
                Movimientos
            </a>
            <a href="{{ route('movimientos.index') }}"> Historial</a>
            



            </a>
        </div>



        <form method="POST" action="{{ route('logout') }}" class="logout">
            @csrf
            <a href="{{ route('config.index') }}"> Configuración</a>

            <button type="submit">

                Cerrar Sesión
            </button>
        </form>
    </div>

    <div class="content" style="margin-left: 250px; padding: 80px;">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>