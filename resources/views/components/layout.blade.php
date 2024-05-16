<html>
    <head>
        <title>{{ $title ?? 'Интернет-магазин' }}</title>
    </head>
    <body>
        <livewire:nav-bar />
        <livewire:flash />
        {{ $slot }}
    </body>
</html>