<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'type', 'category', 'notes'];

    public static function getTotalBalance()
    {
        $totalIncome = self::where('type', 'income')->sum('amount');
        $totalExpense = self::where('type', 'expense')->sum('amount');
        return $totalIncome - $totalExpense;
    }

    public static function getTotalIncome()
    {
        return self::where('type', 'income')->sum('amount');
    }

    public static function getTotalExpense()
    {
        return self::where('type', 'expense')->sum('amount');
    }

    public static function getTotalIncomeCount()
    {
        return self::where('type', 'income')->count();
    }

    public static function getTotalExpenseCount()
    {
        return self::where('type', 'expense')->count();
    }
}
