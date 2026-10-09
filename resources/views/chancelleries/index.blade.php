<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des chancelleries - MAE RCI</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --mae-green: #1a7a3e;
            --mae-orange: #e67e22;
        }
        .bg-mae-green { background-color: var(--mae-green); }
        .text-mae-orange { color: var(--mae-orange); }
        .text-mae-green { color: var(--mae-green); }

        /* Motif pointillé du monde (fond du grand cadre gris) */
        .world-dots-bg {
            background-color: #f7f7f7;
            background-image: radial-gradient(#d9d9d9 1.2px, transparent 1.2px);
            background-size: 14px 14px;
            background-position: center;
        }
    </style>
</head>
<body class="bg-[#faf6f0] min-h-screen">

{{-- ========== HEADER ========== --}}
<header class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/armoiries.png') }}" alt="Armoiries" class="h-16">
            <div class="text-sm">
                <p class="font-bold text-gray-900 uppercase leading-tight">Ministère des Affaires Étrangères</p>
                <p class="font-bold text-gray-900 uppercase leading-tight">et de la Coopération Internationale</p>
                <div class="flex gap-0 mt-1 h-1 w-48">
                    <div class="bg-mae-orange w-1/2"></div>
                    <div class="bg-mae-green w-1/2"></div>
                </div>
            </div>
        </div>

        <div class="hidden md:flex items-center gap-6 text-sm text-gray-700">
            <a href="#" class="flex items-center gap-2 hover:text-mae-green">
                <i class="far fa-question-circle"></i> Centre d'aide
            </a>
            <a href="#" class="flex items-center gap-2 hover:text-mae-green">
                <i class="far fa-envelope"></i> Nous contacter
            </a>
            <div class="flex items-center gap-2">
                    <span class="inline-block w-6 h-4 bg-blue-700 relative">
                        <span class="absolute left-0 top-0 h-2 w-2 bg-white"></span>
                        <span class="absolute right-0 bottom-0 h-2 w-2 bg-red-600"></span>
                    </span>
                Français <i class="fas fa-caret-down text-xs"></i>
            </div>
        </div>
    </div>
    <div class="h-3 bg-mae-green"></div>
</header>

{{-- ========== CONTENU ========== --}}
<main class="max-w-7xl mx-auto px-6 py-8">

    {{-- Bouton retour --}}
    <div class="mb-6">
        <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-gray-800 font-semibold hover:text-mae-green">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>

    {{-- Titre --}}
    <h1 class="text-center text-3xl md:text-4xl font-bold text-[#1e3a8a] mb-6">
        Liste des chancelleries
    </h1>

    {{-- Description --}}
    <p class="text-center text-gray-800 text-lg max-w-4xl mx-auto mb-8">
        Cliquez sur le nom d'une zone pour consulter ses informations, découvrir les services<br>
        disponibles en ligne et accéder facilement aux différentes démarches proposées.
    </p>

    {{-- Grand cadre gris avec motif pointillé --}}
    <div class="world-dots-bg rounded-sm border border-gray-200 p-8 md:p-12">

        {{-- Ligne 1 : 3 cartes --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 mb-8">

            @php
                $zonesTop = [
                    [
                        'nom' => 'AFRIQUE',
                        'representations' => '15 représentations',
                        'bg' => '#e3f2d3',
                        'color' => '#1a7a3e',
                        'svg' => 'africa',
                    ],
                    [
                        'nom' => 'EUROPE',
                        'representations' => '11 représentations',
                        'bg' => '#dcecf9',
                        'color' => '#1a5fb4',
                        'svg' => 'europe',
                    ],
                    [
                        'nom' => 'AMÉRIQUES',
                        'representations' => '05 représentations',
                        'bg' => '#fce8d5',
                        'color' => '#e67e22',
                        'svg' => 'americas',
                    ],
                ];
            @endphp

            @foreach($zonesTop as $zone)
                <a href="#"
                   class="block rounded-2xl p-6 text-center transition hover:-translate-y-1 hover:shadow-lg"
                   style="background-color: {{ $zone['bg'] }};">
                    <div class="flex justify-center mb-4">
                        @include('chancelleries.partials.continent-icon', [
                            'continent' => $zone['svg'],
                            'color' => $zone['color'],
                        ])
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 mb-1">{{ $zone['nom'] }}</h2>
                    <p class="text-sm text-gray-600 mb-4">{{ $zone['representations'] }}</p>
                    <span class="text-mae-green font-semibold inline-flex items-center gap-1">
                            Voir les pays <i class="fas fa-arrow-right text-xs"></i>
                        </span>
                </a>
            @endforeach
        </div>

        {{-- Ligne 2 : 2 cartes centrées --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 max-w-3xl mx-auto">

            @php
                $zonesBottom = [
                    [
                        'nom' => 'ASIE',
                        'representations' => '10 représentations',
                        'bg' => '#ede1f7',
                        'color' => '#7b3fa0',
                        'svg' => 'asia',
                    ],
                    [
                        'nom' => 'OCÉANIE',
                        'representations' => '0 représentations',
                        'bg' => '#dcf1f7',
                        'color' => '#0d94b8',
                        'svg' => 'oceania',
                    ],
                ];
            @endphp

            @foreach($zonesBottom as $zone)
                <a href="#"
                   class="block rounded-2xl p-6 text-center transition hover:-translate-y-1 hover:shadow-lg"
                   style="background-color: {{ $zone['bg'] }};">
                    <div class="flex justify-center mb-4">
                        @include('chancelleries.partials.continent-icon', [
                            'continent' => $zone['svg'],
                            'color' => $zone['color'],
                        ])
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 mb-1">{{ $zone['nom'] }}</h2>
                    <p class="text-sm text-gray-600 mb-4">{{ $zone['representations'] }}</p>
                    <span class="text-mae-green font-semibold inline-flex items-center gap-1">
                            Voir les pays <i class="fas fa-arrow-right text-xs"></i>
                        </span>
                </a>
            @endforeach
        </div>

    </div>

</main>

</body>
</html>
