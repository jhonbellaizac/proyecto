<!DOCTYPE html>
<html lang="es">
<head>
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
    width: 220px;
    height: 100vh;
    background: #111;
    color: white;
    padding: 20px;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar a {
    display: block;
    padding: 10px;
    color: #ccc;
    text-decoration: none;
    border-radius: 6px;
    margin-bottom: 10px;
}

.sidebar a:hover {
    background: #222;
    color: white;
}

/* Contenido */
.content {
    flex: 1;
    padding: 20px;
    background: #f5f5f5;
}
</style>

</head>
<body>

<div class="sidebar">
    <h2>MENU</h2>
    

    <a href="{{ route('clientes.index') }}">📋 Clientes</a>
    <a href="{{ route('clientes.create') }}">➕ Crear Cliente</a>
    <a href="#">📊 Reportes</a>
    <a href="#">⚙️ Configuración</a>
</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>
