<div style="margin-bottom: 1em;">
    <a href="{{ route('orders.index') }}">Список заказов</a>
</div>
<label>ФИО</label>
<dd> <a href="{{ route('orders.edit', $order) }}">{{ $order->fio }}</a></dd>
<label>Товар</label>
<dd>
      {{ $order->product->name }}
</dd>
<label>Цена</label>
<dd>{{ $order->product->price }}</dd>
<label>Количество</label>
<dd>{{ $order->quantity }}</dd>
<label>Сумма</label>
<dd>{{ $order->summ }}</dd>
<label>Коментарий</label>
<dd>
    {{ $order->comment }}
</dd>
<label>Статус</label>
<dd>{{ $order->status }}</dd>