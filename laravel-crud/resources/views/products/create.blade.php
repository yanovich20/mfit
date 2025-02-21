
<div style="margin-bottom: 1em;">
    <a href="{{ route('products.index') }}">Список товаров</a>
</div>

<h1>Create Product</h1>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<form action="{{ route('products.create') }}" method="post">
    @csrf
    <div style="margin-bottom: 1em;">
        <label for="name">Название</label>
        <input type="text" name="name" id="name" placeholder="Введите название" value="{{ old('name') }}">
        @error('name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div style="margin-bottom: 1em;">
        <label for="price">Цена</label>
        <input type="text" name="price" id="price" placeholder="Введите цену" value="{{ old('price') }}">
        @error('price')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div style="margin-bottom: 1em;">
        <label for="category_id">Категория</label>
        <select name="category_id" id="category_id">
            <option value="">Выбрать</option>
            @foreach($categories as $category)
                <option
                    @if ($category->id === (int)old('category_id'))
                        selected
                    @endif
                    value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div style="margin-bottom: 1em;">
        <label for="description">Описание</label>
        <input type="text" name="description" id="description" placeholder="Введите описание" value="{{ old('description') }}">
        @error('description')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
