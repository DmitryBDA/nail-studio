<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'start',
        'comment',
    ];

    protected $casts = [
        'status' => StatusEnum::class
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
