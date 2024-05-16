<div>
    <div>{{ $cartItem->product->name }}</div>
    <div>{{ $cartItem->unit_price }}</div>
    <div>
        <button wire:click="decrement">-</button>
        <div>{{ $cartItem->quantity }}</div>
        <button wire:click="increment">+</button>
    </div>
    <button wire:click="remove">Удалить из корзины</button>
</div>