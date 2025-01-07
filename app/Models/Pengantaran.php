<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengantaran extends Model
{
    use HasFactory;

    public function Transaksi(): BelongsTo  
    {
        return $this->belongsTo('\App\Models\Transaksi')->withDefault();
    }
}
