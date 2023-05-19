<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <x-nav/>
    <div class="min-vh-100 bg-page">
        {{$slot}}
        <x-button/>
    </div>
    <x-footer/>

    @livewireScripts
</body>
</html>