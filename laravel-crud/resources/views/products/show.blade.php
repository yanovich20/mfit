<label>Название</label>
<dd> <a href="{{ route('products.edit', $product) }}">{{ $product->name }}</a></dd>
<label>Цена</label>
<dd>{{ $product->price }}</dd>
<label>Категория</label>
<dd>
      {{ $product->category->name }}
</dd>
<label>Описание</label>
<dd>
    {{ $product->description }}
</dd>