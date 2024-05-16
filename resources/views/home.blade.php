<x-layout>
    <h1>Главная страница</h1>
    @if (!empty($user))
        <div>Вы вошли как "{{ $user->name }}".</div>
    @else
        <div>Нажмите "Войти" чтобы авторизоваться.</div>
    @endif
</x-layout>