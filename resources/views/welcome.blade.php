<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @livewireStyles
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="//unpkg.com/chart.js" defer></script>

        <title>Chart Example</title>

        <style>
            canvas {
                height: 250px;
            }
        </style>
    </head>
    <body class="antialiased">
        <x-chart type="bar" :labels="$labels" :values="$values" />

        @livewireScripts
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="//unpkg.com/alpinejs" defer></script>
    </body>
</html>
