<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-header bg-dark text-white text-center">
                        <h3 class="my-2">
                            Editar Usuario: {{ $usuario->username }}
                        </h3>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
                            @csrf
                            @method('PUT')

                            {{-- ERRORES --}}
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            {{-- USERNAME --}}
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="text" name="username" id="username"
                                        class="form-control"
                                        placeholder="Nombre de usuario"
                                        value="{{ old('username', $usuario->username) }}" required>
                                    <label>Nombre de Usuario</label>
                                </div>
                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input type="password" name="password" id="password"
                                        class="form-control"
                                        placeholder="Nueva contraseña (dejar vacío para mantener)">
                                    <label>Nueva Contraseña (opcional)</label>
                                </div>
                            </div>

                            {{-- ROL Y ACTIVO --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="rol" id="rol" class="form-control" required>
                                            <option value="">Seleccione un rol</option>
                                            <option value="admin" {{ old('rol', $usuario->rol) == 'admin' ? 'selected' : '' }}>Administrador</option>
                                            <option value="user" {{ old('rol', $usuario->rol) == 'user' ? 'selected' : '' }}>Usuario</option>
                                            <option value="manager" {{ old('rol', $usuario->rol) == 'manager' ? 'selected' : '' }}>Gerente</option>
                                        </select>
                                        <label>Rol</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mt-3">
                                        <input type="checkbox" name="activo" id="activo"
                                            class="form-check-input" value="1" {{ old('activo', $usuario->activo) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="activo">
                                            Usuario Activo
                                        </label>
                                    </div>
                                </div>
                            </div>

                            {{-- EMPRESA --}}
                            <div class="mb-3">
                                <div class="form-floating">
                                    <select name="id_empresa" id="id_empresa" class="form-control">
                                        <option value="">Seleccione una empresa (opcional)</option>
                                        @foreach(\App\Models\Empresa::all() as $empresa)
                                        <option value="{{ $empresa->id }}" {{ old('id_empresa', $usuario->id_empresa) == $empresa->id ? 'selected' : '' }}>
                                            {{ $empresa->nombre }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <label>Empresa</label>
                                </div>
                            </div>

                            {{-- BOTONES --}}
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar Usuario</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>