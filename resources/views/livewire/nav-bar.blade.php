<nav>
    <ul>
        <li>
            <a href="{{ route('home'); }}">Главная</a>
        </li>
        <li>
            <a href="{{ route('products'); }}">Товары</a>
        </li>

        @if (auth()->check())
            <li>
                <a href="{{ route('orders'); }}">Заказы</a>
            </li>
            <li>
                <a href="{{ route('cart'); }}">Корзина</a>
            </li>
            <li>
                <a href="javascript:void(0)" wire:click="logout">Выйти</a>
            </li>
        @else
            <li>
                <a href="javascript:void(0)" wire:click="login">Войти</a>
            </li>
        @endif
    </ul>
</nav>