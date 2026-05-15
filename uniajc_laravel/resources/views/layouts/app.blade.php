<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Panel</title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background: #f5f5f5;
        }

        /* =========================
           SIDEBAR
        ========================== */
        .sidebar {

            width: 320px;
            height: 100vh;

            background: #000000;

            color: white;

            padding: 40px;

            display: flex;
            flex-direction: column;

            position: fixed;
            left: 0;
            top: 0;
        }

        /* =========================
           TITULO MENU
        ========================== */
        .menu-title {

            font-size: 40px;

            font-weight: bold;

            text-align: center;

            margin-bottom: 60px;

            letter-spacing: 4px;

            color: white;
        }

        /* =========================
           LINKS MENU
        ========================== */
        .menu-links {

            display: flex;

            flex-direction: column;
        }

        .menu-links a {

            padding: 18px;

            color: #ccc;

            text-decoration: none;

            border-radius: 8px;

            margin-bottom: 10px;

            display: block;

            font-size: 17px;

            transition: 0.3s;
        }

        /* HOVER */
        .menu-links a:hover {

            background: #222;

            color: white;

            padding-left: 25px;
        }

        /* LINK ACTIVO */
        .active {

            background: #222;

            color: white !important;

            font-weight: bold;

            border-left: 5px solid #dc3545;
        }

        /* =========================
           LOGOUT
        ========================== */
        .logout {

            margin-top: auto;
        }

        .logout button {

            width: 100%;

            padding: 12px;

            background: #dc3545;

            border: none;

            color: white;

            border-radius: 8px;

            cursor: pointer;

            font-size: 15px;

            transition: 0.3s;
        }

        .logout button:hover {

            background: #bb2d3b;
        }

        /* =========================
           CONTENIDO
        ========================== */
        .content {

            margin-left: 320px;

            width: 100%;

            padding: 60px;
        }

        .submenu {
            margin-bottom: 10px;
        }

        .submenu-btn {

            width: 100%;

            background: transparent;

            border: none;

            color: #ccc;

            padding: 18px;

            text-align: left;

            font-size: 17px;

            border-radius: 8px;

            transition: 0.3s;
        }

        .submenu-btn:hover {

            background: #222;

            color: white;
        }

        .submenu-content {

            display: none;

            flex-direction: column;

            margin-left: 15px;

            margin-top: 5px;
        }

        .submenu:hover .submenu-content {

            display: flex;
        }

        .submenu-content a {

            font-size: 15px;

            padding: 12px;

            background: #1b1b1b;

            border-radius: 6px;

            margin-bottom: 5px;
        }
    </style>

</head>

<body>

    {{-- SIDEBAR --}}
    <div class="sidebar">

        <h2 class="menu-title">
            MENÚ
        </h2>

        {{-- LINKS --}}
        <div class="menu-links">

            {{-- PRODUCTOS --}}
            <a href="{{ route('productos.index') }}"
                class="{{ request()->routeIs('productos.index') ? 'active' : '' }}">

                Productos

            </a>

            {{-- CREAR PRODUCTO --}}
            <a href="{{ route('productos.create') }}"
                class="{{ request()->routeIs('productos.create') ? 'active' : '' }}">

                Crear Producto

            </a>

            {{-- MOVIMIENTOS --}}
            <a href="{{ route('movimientos.create') }}"
                class="{{ request()->routeIs('movimientos.create') ? 'active' : '' }}">

                Movimientos

            </a>

            {{-- NUEVA VENTA --}}
            <a href="{{ route('ventas.create') }}"
               class="{{ request()->routeIs('ventas.create') ? 'active' : '' }}">

                 Venta
                 

            </a>

            {{-- HISTORIAL --}}
            <div class="submenu">

                <button class="submenu-btn">

                     Historial 

                </button>

                <div class="submenu-content">

                    {{-- MOVIMIENTOS --}}
                    <a href="{{ route('movimientos.index') }}"
                        class="{{ request()->routeIs('movimientos.index') ? 'active' : '' }}">

                         Historial Movimientos

                    </a>

                    {{-- VENTAS --}}
                    <a href="{{ route('ventas.index') }}"
                        class="{{ request()->routeIs('ventas.index') ? 'active' : '' }}">

                         Historial Ventas

                    </a>

                </div>

            </div>
            

            <!-- {{-- HISTORIAL --}}
            <a href="{{ route('movimientos.index') }}"
               class="{{ request()->routeIs('movimientos.index') ? 'active' : '' }}">

                 Historial

            </a>
            

            {{-- VENTAS --}}
            <a href="{{ route('ventas.index') }}"
               class="{{ request()->routeIs('ventas.index') ? 'active' : '' }}">

                 Historial de Ventas

            </a>a-->

             



        </div>



        <form method="POST"
            action="{{ route('logout') }}"
            class="logout">

            @csrf
            <div class="menu-links">

                {{-- CONFIGURACION --}}
                <a href="{{ route('config.index') }}"
                    class="{{ request()->routeIs('config.index') ? 'active' : '' }}">

                    Configuración

                </a>
            </div>

            <button type="submit">

                Cerrar Sesión

            </button>

        </form>

    </div>

    {{-- CONTENIDO --}}
    <div class="content">

        @yield('content')

    </div>

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>