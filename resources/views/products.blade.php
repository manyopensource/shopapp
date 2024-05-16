<x-layout>
    <h1>Товары</h1>
    @foreach ($products as $product)
        <livewire:product :$product />
    @endforeach
    {{ $products->links('pagination::bootstrap-5') }}
</x-layout>