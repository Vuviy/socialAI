<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'additional_name',
        'birthday',
        'phone_number',
        'overview',
        'photo',
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

//    protected function birthday(): Attribute
//    {
//        return Attribute::make(
//            get: fn (string $value) => $value,
//        );
//    }
}
