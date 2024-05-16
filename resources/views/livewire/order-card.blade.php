<div>
    <div>№{{ $order->id }}</div>
    <div>{{ $order->created_at }}</div>
    <div>{{ $order->details->pluck('product.name')->join(', ') }}</div>
    <div>Общая стоимость всех товаров в заказе: {{ $order->details->sum(fn($v) => $v->unit_price * $v->quantity); }}</div>
    <button
        wire:click="remove"
        wire:confirm="Вы уверены что хотите удалить информацию о заказе из базы данных?"
    >
        Удалить
    </button>
</div>