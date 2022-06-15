<br>
<br>
<table class='table table-bordered'>
    <thead style="background:aliceblue">
    <tr>
        <th>ACC HEAD ID</th>
        <th>G. LVL 1</th>
        <th>G. LVL 2</th>
        <th>G. LVL 3</th>
        <th>ACC HEAD</th>
        <th>TOTAL</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($transactions as $transaction)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $transaction['g_level_1'] ?? null }}</td>
            <td>{{ $transaction['g_level_2'] ?? null }}</td>
            <td>{{ $transaction['g_level_3'] ?? null }}</td>
            <td>{{ $transaction['account'] }}</td>
            <td>{{ $transaction['total_amount'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
