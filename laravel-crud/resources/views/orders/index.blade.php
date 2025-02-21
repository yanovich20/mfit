<div><a href="/">Домашняя</a></div>
<a href="{{ route('orders.create') }}">Новый заказ</a>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<table cellpadding="10" cellspacing="1" border="1">
    <thead>
    <tr>
        <td>№.</td>
        <td>Дата создания</td>
        <td>ФИО покупателя</td>
        <td>Статус</td>
        <td> Сумма</td>
        <td>Действие</td>
    </tr>
    </thead>
    <tbody>
    @forelse($orders as $key => $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td> {{$order->created_at}}</a></td>
            <td><a href="{{ route('orders.show', $order['id']) }}">{{ $order->fio }}</a></td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->summ }}</td>
             <td>
                <a href="{{ route('orders.edit', $order) }}">Редактировать</a>

                <form action="{{ route('orders.delete', $order) }}" method="post">
                    @csrf
                    <button type="submit">Удалить</button>
                </form>
                <form action="{{ route('orders.change_status', $order['id']) }}" method="post">
                    @csrf
                    <button type="submit">Сменить статус</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Нет данных</td>
        </tr>
    @endforelse
    </tbody>
</table>