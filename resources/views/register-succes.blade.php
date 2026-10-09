@extends('layouts.app')

@section('title', 'Inscription réussie - MAE RCI')

@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- Carte centrale --}}
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl px-8 md:px-16 py-16">

            {{-- Icône succès avec décorations --}}
            <div class="flex items-center justify-center gap-8 md:gap-14 mb-10">

                {{-- Sparkles gauche --}}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" class="w-14 h-14 md:w-16 md:h-16">
                    <path d="M30 8 L33 20 L45 23 L33 26 L30 38 L27 26 L15 23 L27 20 Z" fill="#f5c542"/>
                    <path d="M12 30 L13.5 35 L18 36.5 L13.5 38 L12 43 L10.5 38 L6 36.5 L10.5 35 Z" fill="#f5c542"/>
                    <circle cx="22" cy="12" r="1.8" fill="#7dd3fc"/>
                    <circle cx="48" cy="42" r="1.8" fill="#7dd3fc"/>
                    <circle cx="48" cy="15" r="1.5" fill="#f5c542"/>
                    <circle cx="12" cy="48" r="1.5" fill="#f5c542"/>
                </svg>

                {{-- Cercle vert avec check --}}
                <div class="relative">
                    <div class="w-24 h-24 md:w-28 md:h-28 rounded-full bg-green-200 flex items-center justify-center">
                        <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-white border-4 border-green-600 flex items-center justify-center">
                            <i class="fas fa-check text-2xl md:text-3xl text-green-600"></i>
                        </div>
                    </div>
                </div>

                {{-- Sparkles droite --}}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" class="w-14 h-14 md:w-16 md:h-16">
                    <path d="M30 8 L33 20 L45 23 L33 26 L30 38 L27 26 L15 23 L27 20 Z" fill="#f5c542"/>
                    <path d="M48 30 L49.5 35 L54 36.5 L49.5 38 L48 43 L46.5 38 L42 36.5 L46.5 35 Z" fill="#f5c542"/>
                    <circle cx="38" cy="12" r="1.8" fill="#7dd3fc"/>
                    <circle cx="12" cy="42" r="1.8" fill="#7dd3fc"/>
                    <circle cx="12" cy="15" r="1.5" fill="#f5c542"/>
                    <circle cx="48" cy="48" r="1.5" fill="#f5c542"/>
                </svg>

            </div>

            {{-- Titre --}}
            <h1 class="text-center text-3xl md:text-4xl font-bold text-green-600 mb-8">
                Inscription réussie !
            </h1>

            {{-- Message principal --}}
            <p class="text-center text-lg md:text-xl font-bold text-gray-900 mb-6">
                Votre compte a été créé avec succès et est maintenant actif.
            </p>

            {{-- Message secondaire --}}
            <p class="text-center text-lg md:text-xl text-gray-800 leading-relaxed mb-16">
                Vous pouvez maintenant accéder à votre espace personnel<br>
                pour en profiter du service en ligne du Ministère .
            </p>

            {{-- Bouton Continuer --}}
            <div class="flex justify-center">
                <a href="{{ url('/') }}"
                   class="w-full max-w-md text-center border-2 border-mae-orange text-mae-orange font-semibold py-4 rounded-lg text-lg hover:bg-orange-50 transition">
                    Continuer la demande
                </a>
            </div>

        </div>

    </div>

@endsection
