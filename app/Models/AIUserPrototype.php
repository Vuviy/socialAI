<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AIUserPrototype extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function userOwner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
