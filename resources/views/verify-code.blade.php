@extends('layouts.auth')

@section('title', 'Vérification du code - MAE RCI')

@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- Carte formulaire --}}
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl px-8 md:px-16 py-12">

            {{-- Icône enveloppe avec @ --}}
            <div class="flex justify-center mb-8">
                <div class="w-28 h-28 rounded-full bg-orange-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-14 h-14">
                        {{-- Corps de l'enveloppe --}}
                        <rect x="6" y="18" width="52" height="34" rx="3" fill="#f5c542" stroke="#e6a817" stroke-width="1.5"/>
                        {{-- Rabat supérieur --}}
                        <path d="M6 20 L32 38 L58 20" fill="none" stroke="#e6a817" stroke-width="1.5"/>
                        {{-- Lettre blanche --}}
                        <rect x="16" y="12" width="32" height="22" rx="1.5" fill="#fdfaf0" stroke="#e6a817" stroke-width="1"/>
                        {{-- Lignes de texte --}}
                        <line x1="20" y1="18" x2="44" y2="18" stroke="#c9c9c9" stroke-width="1"/>
                        <line x1="20" y1="22" x2="44" y2="22" stroke="#c9c9c9" stroke-width="1"/>
                        <line x1="20" y1="26" x2="38" y2="26" stroke="#c9c9c9" stroke-width="1"/>
                        {{-- Pastille @ --}}
                        <circle cx="46" cy="14" r="9" fill="#f5c542" stroke="#e6a817" stroke-width="1.5"/>
                        <text x="46" y="18" text-anchor="middle" font-size="12" font-weight="bold" fill="#7a4a00">@</text>
                    </svg>
                </div>
            </div>

            {{-- Titre --}}
            <h1 class="text-center text-2xl md:text-3xl font-bold text-gray-900 leading-snug mb-4">
                Un code de vérification a été envoyé à<br>
                votre adresse e-mail.
            </h1>

            {{-- Sous-titre --}}
            <p class="text-center text-gray-700 text-lg mb-6">
                Veuillez saisir le code reçu pour continuer.
            </p>

            {{-- Label code --}}
            <p class="text-center text-gray-700 mb-4">
                Code de vérification
            </p>

            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.verify') }}" id="verifyForm">
                @csrf

                {{-- Champs code (6 chiffres) --}}
                <div class="flex justify-center gap-3 md:gap-4 mb-8" id="codeInputs">
                    @for ($i = 0; $i < 6; $i++)
                        <input type="text"
                               name="code[]"
                               inputmode="numeric"
                               maxlength="1"
                               pattern="[0-9]"
                               autocomplete="one-time-code"
                               class="code-input w-14 h-16 md:w-16 md:h-16 text-center text-2xl font-semibold border border-gray-300 rounded-lg focus:outline-none focus:border-mae-orange focus:ring-2 focus:ring-orange-200 transition">
                    @endfor
                </div>

                {{-- Champ caché qui contiendra le code complet --}}
                <input type="hidden" name="code" id="codeHidden">

                {{-- Renvoi du code --}}
                <p class="text-center text-gray-700 mb-8">
                    Renvoyer le code dans
                    <span id="countdown" class="text-green-600 font-semibold">00:45</span>
                </p>

                {{-- Boutons --}}
                <div class="grid grid-cols-2 gap-4 max-w-md mx-auto">
                    <a href="{{ url()->previous() }}"
                       class="border-2 border-gray-800 text-gray-900 font-semibold py-3 rounded-lg text-center hover:bg-gray-100 transition">
                        Retour
                    </a>
                    <button type="submit"
                            class="btn-mae-orange text-white font-semibold py-3 rounded-lg flex items-center justify-center gap-2">
                        Vérifier
                        <i class="fas fa-arrow-right text-sm"></i>
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script>
        // ----- Gestion des inputs à 6 chiffres -----
        const inputs = document.querySelectorAll('.code-input');
        const hidden = document.getElementById('codeHidden');

        function updateHidden() {
            hidden.value = Array.from(inputs).map(i => i.value).join('');
        }

        inputs.forEach((input, idx) => {
            // Saisie : avance automatiquement au champ suivant
            input.addEventListener('input', (e) => {
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
                if (e.target.value && idx < inputs.length - 1) {
                    inputs[idx + 1].focus();
                }
                updateHidden();
            });

            // Backspace : revient au champ précédent si vide
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && idx > 0) {
                    inputs[idx - 1].focus();
                    inputs[idx - 1].value = '';
                    updateHidden();
                }
                // Flèches gauche/droite
                if (e.key === 'ArrowLeft' && idx > 0) inputs[idx - 1].focus();
                if (e.key === 'ArrowRight' && idx < inputs.length - 1) inputs[idx + 1].focus();
            });

            // Coller un code complet (6 chiffres)
            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const pasted = (e.clipboardData || window.clipboardData).getData('text').replace(/\D/g, '');
                if (!pasted) return;
                const digits = pasted.slice(0, 6).split('');
                digits.forEach((d, i) => {
                    if (inputs[i]) inputs[i].value = d;
                });
                const nextIdx = Math.min(digits.length, inputs.length - 1);
                inputs[nextIdx].focus();
                updateHidden();
            });
        });

        // ----- Compte à rebours 45 secondes -----
        let seconds = 45;
        const countdownEl = document.getElementById('countdown');

        function renderCountdown() {
            const m = String(Math.floor(seconds / 60)).padStart(2, '0');
            const s = String(seconds % 60).padStart(2, '0');
            countdownEl.textContent = `${m}:${s}`;
        }

        const interval = setInterval(() => {
            seconds--;
            if (seconds <= 0) {
                clearInterval(interval);
                countdownEl.textContent = '00:00';
                // Optionnel : activer un bouton "Renvoyer le code"
                countdownEl.parentElement.innerHTML =
                    'Vous n\'avez pas reçu le code ? ' +
                    '<a href="#" id="resendLink" class="text-green-600 font-semibold hover:underline">Renvoyer</a>';
            } else {
                renderCountdown();
            }
        }, 1000);

        renderCountdown();
    </script>

@endsection
