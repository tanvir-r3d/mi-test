<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $primaryKey = "id";
    protected $fillable = [
        'account_head_id', 'date', 'debit', 'credit'
    ];

    public function accountHead(): BelongsTo
    {
        return $this->belongsTo(AccountHead::class, 'account_head_id')->withDefault();
    }
}
