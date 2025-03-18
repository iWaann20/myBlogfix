<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubMenu extends Model
{
    /** @use HasFactory<\Database\Factories\SubMenuFactory> */
    use HasFactory;
    protected $guarded = ['id'];
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
