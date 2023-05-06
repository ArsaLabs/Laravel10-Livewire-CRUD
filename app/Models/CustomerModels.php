<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransactionModels;

class CustomerModels extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'point'];

    public function transaction(): HasMany
    {
        return $this->hasMany(TransactionModels::class);
    }
}
