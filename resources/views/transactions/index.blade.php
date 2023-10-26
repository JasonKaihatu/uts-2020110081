@extends('layouts.app')
@if(session('success'))
<div class="alert alert-success" id="successAlert">
    {{ session('success') }}
</div>
@endif

@if(session('danger'))
<div class="alert alert-danger" id="dangerAlert">
    {{ session('danger') }}
</div>
@endif

@section('content')
<div class="container">
    <div class="card bg-light">
        <div class="card-body text-center">
            <p class="card-text">
                 Saldo Saat Ini: Rp {{ number_format($balance, 0, ',', '.') }}
            </p>
            <p class="card-text"> Total Pemasukan: Rp {{ number_format($totalIncome, 0, ',', '.') }}
            </p>
            <p class="card-text"> Total Pengeluaran: Rp {{ number_format($totalExpense, 0, ',', '.') }}
            </p>
            <p class="card-text">Jumlah Transaksi Pemasukan: {{ $totalIncomeCount }}
            </p>
            <p class="card-text"> Jumlah Transaksi Pengeluaran: {{ $totalExpenseCount }}
            </p>

    <a href="{{ route('transactions.create') }}" class="btn btn-primary mt-3 mb-3" style="margin-left:10px;">Input Transaksi</a>
        </div>
    </div>

    <div class="card">
        <div class="card-title"> <h1>&nbsp;Data Transaksi</h1></div>
        <div class="card-body alert alert-dark">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Jumlah</th>
                        <th>Tipe</th>
                        <th>Kategori</th>
                        <th>Catatan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $nomor }}</td>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ 'Rp ' . number_format($transaction->amount, 0, ',', '.') }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->category }}</td>
                        <td>{{ $transaction->notes }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>
                            <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-secondary">Show</a>&nbsp;&nbsp;
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-info">Edit</a>&nbsp;
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline;">&nbsp;
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @php
                    $nomor++; // Tambahkan nilai penghitung
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        var successAlert = document.getElementById('successAlert');
        var dangerAlert = document.getElementById('dangerAlert');

        if (successAlert) {
            successAlert.style.display = 'none';
        }

        if (dangerAlert) {
            dangerAlert.style.display = 'none';
        }
    }, 3000);
</script>
@endsection
