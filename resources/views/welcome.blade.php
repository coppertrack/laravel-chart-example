<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <title>Chart Example</title>

    <style>
        canvas {
            height: 250px;
        }

    </style>

    @livewireStyles

    <link
        rel="stylesheet"
        href="{{ mix('css/app.css') }}"
    >

    @livewireScripts

    <script
        src="{{ mix('js/app.js') }}"
        defer
    ></script>
</head>

<body class="antialiased">
    <x-chart
        :data="$chart"
    />
</body>

</html>
