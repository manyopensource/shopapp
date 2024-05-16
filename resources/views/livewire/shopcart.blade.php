<div>
    @if ($cartItems->isNotEmpty())
        @foreach ($cartItems as $cartItem)
            <livewire:cart-item :$cartItem :key="$cartItem->id" @deleted="$refresh" />
        @endforeach
        <div @changed="$refresh">Общая стоимость всех товаров в заказе: {{ $cartItems->sum(fn($v) => $v->unit_price * $v->quantity); }}</div>
        <button wire:click="checkout">Оформить заказ</button>
    @else
        <div>Тут пусто и грустно 🥺</div>
    @endif
</div>