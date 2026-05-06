@extends('layouts.app')

@section('content')

<div class="container mt-5" style="max-width: 700px;">

    <div class="card shadow">

        <div class="card-header bg-dark text-white text-center">
            <h4> Configuración de Usuario</h4>
        </div>

        <div class="card-body">

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
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

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('config.update') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name"
                        value="{{ auth()->user()->name }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email"
                        value="{{ auth()->user()->email }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña actual</label>
                    <input type="password" name="current_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nueva contraseña</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-4">
                    <label class="form-label">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-danger w-100">
                    Guardar cambios
                </button>

            </form>

        </div>

    </div>

</div>

@endsection