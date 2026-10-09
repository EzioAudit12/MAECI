@extends('layouts.app')

@section('title', 'Connexion - MAE RCI')

@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- Bouton Retour --}}
        <div class="mb-6">
            <a href="{{ url('/') }}"
               class="inline-flex items-center gap-2 bg-white border-2 border-gray-400 hover:border-mae-green hover:text-mae-green text-gray-700 font-semibold px-5 py-2 rounded-lg shadow-sm transition">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>

        {{-- Carte formulaire --}}
        <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-xl p-8 md:p-12">

            <div class="text-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                    Connexion à votre espace
                </h1>
                <p class="text-gray-600">
                    Veuillez saisir vos identifiants professionnels pour accéder à votre interface.
                </p>
            </div>

            {{-- Message de session (ex : après déconnexion) --}}
            @if (session('status'))
                <div class="mb-6 flex items-start gap-3 bg-green-50 border-l-4 border-green-600 text-green-800 px-4 py-3 rounded-lg text-sm shadow-sm">
                    <i class="fas fa-circle-check mt-0.5"></i>
                    <span>{{ session('status') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-600 text-red-800 px-4 py-3 rounded-lg shadow-sm">
                    <p class="flex items-center gap-2 font-semibold mb-2">
                        <i class="fas fa-circle-exclamation"></i>
                        Une erreur est survenue
                    </p>
                    <ul class="list-disc list-inside text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                {{-- Login --}}
                <div>
                    <label for="login" class="block font-semibold text-gray-800 mb-2">
                        Login
                    </label>
                    <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="far fa-envelope"></i>
                    </span>
                        <input type="text" name="login" id="login"
                               value="{{ old('login') }}"
                               placeholder="Entrez login"
                               required
                               autofocus
                               class="form-input w-full pl-10 pr-3 py-3 border rounded-lg transition @error('login') is-invalid @enderror">
                    </div>
                </div>

                {{-- Mot de passe --}}
                <div>
                    <label for="password" class="block font-semibold text-gray-800 mb-2">
                        Mot de passe
                    </label>
                    <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                        <input type="password" name="password" id="password"
                               placeholder="Entrez votre mot de passe."
                               required
                               class="form-input w-full pl-10 pr-12 py-3 border rounded-lg transition @error('password') is-invalid @enderror">
                        <button type="button" onclick="togglePassword('password', this)"
                                aria-label="Afficher le mot de passe"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-mae-green">
                            <i class="fas fa-eye-slash"></i>
                        </button>
                    </div>
                </div>

                {{-- Se souvenir + mot de passe oublié --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" id="remember"
                               {{ old('remember') ? 'checked' : '' }}
                               class="mae-checkbox w-5 h-5 border-gray-300 rounded">
                        <span class="text-gray-800">Se souvenir de moi</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-blue-600 font-semibold hover:underline text-sm">
                            Mot de passe oublié ?
                        </a>
                    @endif
                </div>

                {{-- Bouton submit --}}
                <div>
                    <button type="submit"
                            class="w-full btn-mae-orange text-white font-bold py-4 rounded-lg shadow-lg text-lg">
                        Se connecter
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script>
        function togglePassword(fieldId, btn) {
            const input = document.getElementById(fieldId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }
    </script>

@endsection
