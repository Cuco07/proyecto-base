<form method="POST" action="{{ route('login') }}" style="width: 300px;">
    @csrf

    <!-- Email -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Correo Electrónico')" />
        <x-text-input id="email" class="block mt-1 w-full"
            type="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Contraseña')" />
        <x-text-input id="password" class="block mt-1 w-full"
            type="password" name="password" required />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox"
                class="rounded border-gray-300 text-indigo-600 shadow-sm"
                name="remember">
            <span class="ms-2 text-sm text-gray-600">Recordarme</span>
        </label>
    </div>

    <!-- Submit -->
    <div class="flex items-center justify-center mt-4">
        <x-primary-button>
            Ingresar
        </x-primary-button>
    </div>
</form>
