<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class AccountHead extends Model
{
    use HasFactory;

    protected $table = "account_heads";
    protected $primaryKey = "id";
    protected $fillable = [
        'name', 'parent_id', 'level'
    ];

    public function parentAccountHead(): BelongsTo
    {
        return $this->belongsTo(AccountHead::class, 'parent_id')->withDefault();
    }

    public function childAccountHeads(): HasMany
    {
        return $this->hasMany(AccountHead::class, 'parent_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'account_head_id');
    }

    public function childTransactions(): HasManyThrough
    {
        return $this->hasManyThrough(
            Transaction::class,
            AccountHead::class,
            'parent_id',
            'account_head_id',
            'id',
        );
    }
}
