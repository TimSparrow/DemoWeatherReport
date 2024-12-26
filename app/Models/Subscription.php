<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    public const UV = 'uv';
    public const RAIN = 'rain';

    /** @use HasFactory<\Database\Factories\SubscriptionFactory> */
    use HasFactory;

    protected $primaryKey = 'id';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function getActiveForEmail(): Collection
    {
        return Subscription::query()->where('email', true)->get();
    }


}
