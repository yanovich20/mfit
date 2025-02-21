
<div style="margin-bottom: 1em;">
    <a href="{{ route('orders.index') }}">Список заказов</a>
</div>

<h1>Создать заказ</h1>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<form action="{{ route('orders.create') }}" method="post">
    @csrf
    <div style="margin-bottom: 1em;">
        <label for="fio">ФИО</label>
        <input type="text" name="fio" id="fio" placeholder="Введите ФИО" value="{{ old('fio') }}">
        @error('fio')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div style="margin-bottom: 1em;">
        <label for="status">Кмментарий к заказу</label>
        <input type="text" name="comment" id="comment" placeholder="Комментарий" value="{{ old('comment') }}">
        @error('comment')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div style="margin-bottom: 1em;">
        <label for="product_id">Товар</label>
        <select name="product_id" id="product_id">
            <option value="">Выбрать</option>
            @foreach($products as $product)
                <option
                    @if ($product->id === (int)old('product_id'))
                        selected
                    @endif
                    value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
        @error('product_id')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div style="margin-bottom: 1em;">
        <label for="quantity">Количество</label>
        <input type="text" name="quantity" id="quantity" placeholder="Введите количество" value="{{ old('quantity') }}">
        @error('quantity')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
