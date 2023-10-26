@extends('layouts.app')

@section('content')
<h1>Tambah Transaksi</h1>

<form method="POST" action="{{ route('transactions.store') }}">
    @csrf
    <div class="form-group">
        <label for="amount">Jumlah:</label>
        <input type="number" step="0.01" name="amount" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="type">Tipe Transaksi:</label>
        <select name="type" id="type" class="form-control" required>
            <option value="" disabled selected>Pilih Tipe Transaksi</option>
            <option value="income">Income</option>
            <option value="expense">Expense</option>
        </select>
    </div>

    <div class="form-group">
        <label for="category">Kategori Transaksi:</label>
        <select name="category" id="category" class="form-control" required>
            <option value="" disabled selected>Pilih tipe terlebih dahulu</option>
        </select>
    </div>
    <div class="form-group">
        <label for="notes">Catatan:</label>
        <textarea name="notes" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>

<a href="{{ route('transactions.index') }}" class="btn btn-secondary mt-2">Kembali</a>

<script>
    // Menangani perubahan pada pilihan tipe transaksi
    document.getElementById('type').addEventListener('change', function() {
        var type = this.value;
        var categorySelect = document.getElementById('category');

        // Bersihkan opsi kategori yang ada
        categorySelect.innerHTML = '';

        // Buat opsi kategori berdasarkan tipe transaksi yang dipilih
        if (type === 'income') {
            var incomeCategories = ['wage', 'bonus', 'gift'];
            createOptions(categorySelect, incomeCategories);
        } else if (type === 'expense') {
            var expenseCategories = ['food & drinks', 'shopping', 'charity', 'housing', 'insurance', 'taxes', 'transportation'];
            createOptions(categorySelect, expenseCategories);
        } else {
            // Tampilkan pesan default jika tipe tidak dipilih
            categorySelect.innerHTML = '<option value="" disabled selected>Pilih tipe terlebih dahulu</option>';
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