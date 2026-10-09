@extends('layouts.app')

@section('title', 'Créer votre compte - MAE RCI')

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
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl p-8 md:p-12">

            <div class="text-center mb-8">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                    Créez votre compte
                </h1>
                <p class="text-gray-600">
                    Remplissez les informations ci-dessous pour créer votre compte.
                </p>
            </div>

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-600 text-red-800 px-4 py-3 rounded-lg shadow-sm">
                    <p class="flex items-center gap-2 font-semibold mb-2">
                        <i class="fas fa-circle-exclamation"></i>
                        Veuillez corriger les erreurs suivantes
                    </p>
                    <ul class="list-disc list-inside text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                {{-- Ligne 1 : Nom / Prénom(s) --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="nom" class="block font-semibold text-gray-800 mb-2">
                            Nom <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                            <input type="text" name="nom" id="nom"
                                   value="{{ old('nom') }}"
                                   placeholder="Entrez votre nom"
                                   required
                                   class="form-input w-full pl-10 pr-3 py-3 border rounded-lg transition @error('nom') is-invalid @enderror">
                        </div>
                    </div>

                    <div>
                        <label for="prenom" class="block font-semibold text-gray-800 mb-2">
                            Prénom(s) <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                            <input type="text" name="prenom" id="prenom"
                                   value="{{ old('prenom') }}"
                                   placeholder="Entrez votre prénom"
                                   required
                                   class="form-input w-full pl-10 pr-3 py-3 border rounded-lg transition @error('prenom') is-invalid @enderror">
                        </div>
                    </div>
                </div>

                {{-- Ligne 2 : Pays / Téléphone --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="pays" class="block font-semibold text-gray-800 mb-2">
                            Pays de résidence <span class="text-red-600">*</span>
                        </label>
                        <select name="pays" id="pays" required
                                class="form-select w-full appearance-none px-3 py-3 pr-10 border rounded-lg bg-white transition @error('pays') is-invalid @enderror">
                            <option value="">Sélectionnez votre pays</option>
                            <option value="CI" @selected(old('pays') == 'CI')>Côte d'Ivoire</option>
                            <option value="FR" @selected(old('pays') == 'FR')>France</option>
                            <option value="US" @selected(old('pays') == 'US')>États-Unis</option>
                            <option value="CA" @selected(old('pays') == 'CA')>Canada</option>
                            <option value="SN" @selected(old('pays') == 'SN')>Sénégal</option>
                            <option value="ML" @selected(old('pays') == 'ML')>Mali</option>
                            <option value="BF" @selected(old('pays') == 'BF')>Burkina Faso</option>
                            {{-- Ajoute dynamiquement d'autres pays depuis la BDD --}}
                        </select>
                    </div>

                    <div>
                        <label for="telephone" class="block font-semibold text-gray-800 mb-2">
                            Numéro de téléphone <span class="text-red-600">*</span>
                        </label>
                        <div class="flex">
                            <div class="flex items-center gap-2 px-3 py-3 border border-r-0 border-gray-300 rounded-l-lg bg-gray-50">
                                <span class="inline-block w-6 h-4 bg-orange-500 relative">
                                    <span class="absolute left-0 top-0 h-2 w-2 bg-white"></span>
                                    <span class="absolute right-0 bottom-0 h-2 w-2 bg-green-600"></span>
                                </span>
                                <i class="fas fa-caret-down text-gray-500 text-xs"></i>
                            </div>
                            <span class="flex items-center px-3 border-y border-gray-300 bg-gray-50 text-gray-700 font-medium whitespace-nowrap">
                                +225
                            </span>
                            <input type="tel" name="telephone" id="telephone"
                                   value="{{ old('telephone') }}"
                                   placeholder="XX XX XX XX XX"
                                   required
                                   class="form-input flex-1 px-3 py-3 border border-l-0 border-gray-300 rounded-r-lg transition @error('telephone') is-invalid @enderror">
                        </div>
                    </div>
                </div>

                {{-- Ligne 3 : Email / Confirmer email --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="email" class="block font-semibold text-gray-800 mb-2">
                            Email <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="far fa-envelope"></i>
                        </span>
                            <input type="email" name="email" id="email"
                                   value="{{ old('email') }}"
                                   placeholder="Exemple@gmail.com"
                                   required
                                   class="form-input w-full pl-10 pr-3 py-3 border rounded-lg transition @error('email') is-invalid @enderror">
                        </div>
                    </div>

                    <div>
                        <label for="email_confirmation" class="block font-semibold text-gray-800 mb-2">
                            Confirmer l'email <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="far fa-envelope"></i>
                        </span>
                            <input type="email" name="email_confirmation" id="email_confirmation"
                                   value="{{ old('email_confirmation') }}"
                                   placeholder="Exemple@gmail.com"
                                   required
                                   class="form-input w-full pl-10 pr-3 py-3 border rounded-lg transition">
                        </div>
                    </div>
                </div>

                {{-- Ligne 4 : Mot de passe / Confirmer --}}
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block font-semibold text-gray-800 mb-2">
                            Mot de passe <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="password" name="password" id="password"
                                   placeholder="Créez un mot de passe"
                                   required
                                   class="form-input w-full px-3 py-3 pr-11 border rounded-lg transition @error('password') is-invalid @enderror">
                            <button type="button" onclick="togglePassword('password', this)"
                                    aria-label="Afficher le mot de passe"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-mae-green">
                                <i class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block font-semibold text-gray-800 mb-2">
                            Confirmer le mot de passe <span class="text-red-600">*</span>
                        </label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   placeholder="Confirmez votre mot de passe"
                                   required
                                   class="form-input w-full px-3 py-3 pr-11 border rounded-lg transition">
                            <button type="button" onclick="togglePassword('password_confirmation', this)"
                                    aria-label="Afficher le mot de passe"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-mae-green">
                                <i class="fas fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Conditions --}}
                <div class="flex items-start gap-3">
                    <input type="checkbox" name="conditions" id="conditions" required
                           class="mae-checkbox mt-1 w-5 h-5 border-gray-300 rounded">
                    <label for="conditions" class="text-gray-800">
                        J'accepte les
                        <a href="#" class="text-blue-600 hover:underline">Conditions d'utilisation</a>
                        et la
                        <a href="#" class="text-blue-600 hover:underline">Politique de confidentialité</a>
                    </label>
                </div>

                {{-- reCAPTCHA --}}
                <div>
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                    @error('g-recaptcha-response')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Bouton submit --}}
                <div class="text-center pt-2">
                    <button type="submit"
                            class="btn-mae-orange text-white font-bold px-12 py-4 rounded-lg shadow-lg text-lg inline-flex items-center gap-3">
                        Créer mon compte
                    </button>
                </div>

            </form>

            {{-- Lien connexion --}}
            <div class="text-center mt-8 text-gray-700">
                Vous avez déjà un compte ?
                <a href="{{ route('login') }}" class="text-blue-600 font-semibold hover:underline">
                    Se connecter ici
                </a>
            </div>

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
