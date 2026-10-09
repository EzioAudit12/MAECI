@php
    // Silhouettes simplifiées — remplace par les tracés exacts si besoin
    $paths = [
        'africa' => '<path d="M42 10 L55 8 L62 15 L60 25 L65 32 L62 45 L55 52 L52 60 L45 62 L38 55 L35 45 L30 35 L32 25 L35 15 Z" fill="COLOR"/>',
        'europe'  => '<path d="M20 40 L35 25 L55 20 L65 28 L60 40 L50 45 L45 55 L35 58 L25 50 Z" fill="COLOR"/>',
        'americas'=> '<path d="M25 15 L40 20 L45 35 L40 55 L35 65 L30 60 L28 45 L20 35 L22 25 Z" fill="COLOR"/>
                     <path d="M55 30 L62 40 L60 55 L55 60 L52 50 L53 38 Z" fill="COLOR"/>',
        'asia'    => '<path d="M20 35 L40 22 L65 25 L70 40 L60 48 L50 52 L40 50 L25 45 Z" fill="COLOR"/>',
        'oceania' => '<path d="M30 40 L45 38 L50 45 L45 55 L35 55 L28 48 Z" fill="COLOR"/>
                     <circle cx="55" cy="42" r="3" fill="COLOR"/>',
    ];
    $color = $color ?? '#1a7a3e';
    $svgContent = str_replace('COLOR', $color, $paths[$continent] ?? '');
@endphp

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 75" class="w-20 h-20 md:w-24 md:h-24">
    {!! $svgContent !!}
</svg>
