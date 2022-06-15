<table class='table table-stripe table-border'>
    <thead>
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
                <td>{{ null }}</td>
                <td>{{ null }}</td>
                <td>{{ optional($transaction->parentAccountHead)->name }}</td>
                <td>{{ optional($transaction->accountHead)->name }}</td>
                <td>{{ $transaction->total_amount }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
