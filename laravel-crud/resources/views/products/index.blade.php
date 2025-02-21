<div><a href="/">Домашняя</a></div>
<a href="{{ route('products.create') }}">Новый продукт</a>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<table cellpadding="10" cellspacing="1" border="1">
    <thead>
    <tr>
        <td>№.</td>
        <td>Название</td>
        <td>Цена</td>
        <td>Категория</td>
        <td>Действие</td>
    </tr>
    </thead>
    <tbody>
    @forelse($products as $key => $product)
        <tr>
            <td>{{ /*$products->firstItem() +*/ $key }}.</td>
            <td> <a href="{{ route('products.show', $product['id']) }}">{{ $product->name }}</a></td>
            <td>{{ $product->price }}</td>
            <td>
                {{ $product->category->name }}
            </td>
             <td>
                <a href="{{ route('products.edit', $product) }}">Редактировать</a>

                <form action="{{ route('products.delete', $product) }}" method="post">
                    @csrf
                    <button type="submit">Удалить</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5">Нет данных</td>
        </tr>
    @endforelse
    </tbody>
</table>