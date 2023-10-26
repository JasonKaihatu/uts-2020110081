@extends('layouts.app')

@section('content')
<h1>Detail Transaksi</h1>

<table class="table">
    <tr>
        <th>ID</th>
        <td>{{ $transaction->id }}</td>
    </tr>
    <tr>
        <th>Jumlah</th>
        <td>{{ $transaction->amount }}</td>
    </tr>
    <tr>
        <th>Tipe</th>
        <td>{{ $transaction->type }}</td>
    </tr>
    <tr>
        <th>Kategori</th>
        <td>{{ $transaction->category }}</td>
    </tr>
    <tr>
        <th>Catatan</th>
        <td>{{ $transaction->notes }}</td>
    </tr>
    <tr>
        <th>Tanggal</th>
        <td>{{ $transaction->created_at }}</td>
    </tr>
</table>

<a href="{{ route('transactions.index') }}" class="btn btn-secondary">Kembali</a>
@endsection