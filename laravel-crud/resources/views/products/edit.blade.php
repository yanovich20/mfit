<div style="margin-bottom: 1em;">
    <a href="{{ route('products.index') }}">t</a>
</div>

<h1>Редактировать товар</h1>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<form action="{{ route('products.edit', $product) }}" method="post">
    @csrf
    <div style="margin-bottom: 1em;">
        <label for="name">Название</label>
        <input type="text" name="name" id="name" placeholder="Введите название" value="{{ $product->name }}">
        @error('name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div style="margin-bottom: 1em;">
        <label for="price">Стоимость</label>
        <input type="text" name="price" id="price" placeholder="Введите стоимость" value="{{ $product->price }}">
        @error('price')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div style="margin-bottom: 1em;">
        <label for="price">Описание</label>
        <input type="text" name="description" id="description" placeholder="Введите описание" value="{{ $product->comment }}">
    </div>
    <div style="margin-bottom: 1em;">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id">
            <option value="">Select</option>
            @foreach($categories as $category)
                <option
                    @if ($category->id === (int)$product->category_id)
                    selected
                    @endif
                    value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>