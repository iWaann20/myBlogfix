<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Otp extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'otp_code', 
        'expires_at'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
