@extends('layouts.app')

@section('content')
<h1>Edit Transaksi</h1>

<form method="POST" action="{{ route('transactions.update', $transaction->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="amount">Jumlah:</label>
        <input type="number" step="0.01" name="amount" class="form-control" value="{{ $transaction->amount }}" required>
    </div>
    <div class="form-group">
        <label for="type">Tipe:</label>
        <select name="type" class="form-control" id="typeSelect" required>
            <option value="income" @if($transaction->type == 'income') selected @endif>Pemasukan</option>
            <option value="expense" @if($transaction->type == 'expense') selected @endif>Pengeluaran</option>
        </select>
    </div>

    <div class="form-group">
        <label for="category">Kategori:</label>
        <select name="category" id="categorySelect" class="form-control" required>
            @if($transaction->type == 'income')
            <option value="wage" @if($transaction->category == 'wage') selected @endif>Wage</option>
            <option value="bonus" @if($transaction->category == 'bonus') selected @endif>Bonus</option>
            <option value="gift" @if($transaction->category == 'gift') selected @endif>Gift</option>
            @elseif($transaction->type == 'expense')
            <option value="food & drinks" @if($transaction->category == 'food & drinks') selected @endif>Food & Drinks</option>
            <option value="shopping" @if($transaction->category == 'shopping') selected @endif>Shopping</option>
            <option value="charity" @if($transaction->category == 'charity') selected @endif>Charity</option>
            <option value="housing" @if($transaction->category == 'housing') selected @endif>Housing</option>
            <option value="insurance" @if($transaction->category == 'insurance') selected @endif>Insurance</option>
            <option value="taxes" @if($transaction->category == 'taxes') selected @endif>Taxes</option>
            <option value="transportation" @if($transaction->category == 'transportation') selected @endif>Transportation</option>
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="notes">Catatan:</label>
        <textarea name="notes" class="form-control">{{ $transaction->notes }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>

<a href="{{ route('transactions.index') }}" class="btn btn-secondary mt-2">Kembali</a>
<script>
    // Menangani perubahan pada pilihan tipe transaksi
    var typeSelect = document.getElementById('typeSelect');
    var categorySelect = document.getElementById('categorySelect');

    typeSelect.addEventListener('change', function() {
        var type = this.value;

        // Bersihkan opsi kategori yang ada
        categorySelect.innerHTML = '';

        // Buat opsi kategori berdasarkan tipe transaksi yang dipilih
        if (type === 'income') {
            var incomeCategories = ['wage', 'bonus', 'gift'];
            createOptions(categorySelect, incomeCategories);
        } else if (type === 'expense') {
            var expenseCategories = ['food & drinks', 'shopping', 'charity', 'housing', 'insurance', 'taxes', 'transportation'];
            createOptions(categorySelect, expenseCategories);
        }
    });

    // Fungsi untuk membuat opsi-opsi dalam elemen select
    function createOptions(selectElement, categories) {
        for (var i = 0; i < categories.length; i++) {
            var option = document.createElement('option');
            option.value = categories[i];
            option.text = categories[i];
            selectElement.appendChild(option);
        }
    }
</script>
@endsection