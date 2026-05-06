<x-guest-layout>

        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-1">

            <h2 class="text-xl font-semibold text-gray-800 mb-2">
                Crear Cuenta
            </h2>
            <p class="text-sm text-gray-500 mb-4">
                Regístrate para comenzar
            </p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre -->
                <div>
                    <label class="block text-sm text-gray-700">Nombre</label>
                    <input type="text" name="name"
                        class="w-full mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        required autofocus>
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <label class="block text-sm text-gray-700">Correo electrónico</label>
                    <input type="email" name="email"
                        class="w-full mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                </div>

                <!-- Rol -->
                <div class="mt-4">
                    <label class="block text-sm text-gray-700">Rol</label>
                    <select name="role"
                        class="w-full mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="user">Usuario</option>
                    </select>
                    <p class="text-xs text-gray-500 mt-1">Solo administradores pueden asignar roles superiores</p>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label class="block text-sm text-gray-700">Contraseña</label>
                    <input type="password" name="password"
                        class="w-full mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label class="block text-sm text-gray-700">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation"
                        class="w-full mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        required>
                </div>

                <!-- Botón -->
                <div class="mt-6">
                    <button
                        class="w-full bg-gray-900 hover:bg-black text-white py-2 rounded-md text-sm">
                        Registrarse
                    </button>
                </div>

                <!-- Login link -->
                <div class="mt-4 text-center">
                    <a href="{{ route('login') }}"
                        class="text-sm text-gray-500 hover:text-gray-800">
                        ¿Ya tienes cuenta? Inicia sesión
                    </a>
                </div>

            </form>
        </div>

    </div>
</x-guest-layout>
