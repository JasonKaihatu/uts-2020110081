@extends('layouts.app')

@section('content')
<h1>Konfirmasi Penghapusan Transaksi</h1>

<p>Apakah Anda yakin ingin menghapus transaksi ini?</p>

<form method="POST" action="{{ route('transactions.destroy', $transaction->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Hapus</button>
</form>

<a href="{{ route('transactions.index') }}" class="btn btn-secondary mt-2">Batal</a>
@endsection