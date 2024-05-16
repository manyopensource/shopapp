<div>
    <div>{{ $product->name }}</div>
    <div>{{ $product->price }}</div>
    <div>
        <button wire:click="decrement">-</button>
        <div>{{ $quantity }}</div>
        <button wire:click="increment">+</button>
    </div>
    @if(auth()->check())
        <button wire:click="addToCart">Добавить в корзину</button>
    @else
        <button disabled>Добавить в корзину</button>
    @endif
</div>