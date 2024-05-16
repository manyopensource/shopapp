<x-layout>
    <h1>Заказы</h1>
    @if ($orders->isNotEmpty())
        @foreach ($orders as $order)
            <livewire:order-card :$order @deleted="$refresh" />
        @endforeach
        <div>Итоговая стоимость всех заказов {{ $totalSum }}</div>
    @else
        <div>Выглядит как будто Вы еще ничего не заказывали!</div>
    @endif
</x-layout>