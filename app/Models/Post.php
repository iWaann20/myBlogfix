<?php

namespace App\Models;


use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use Sluggable;
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['author', 'category'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query->where('title', 'like', '%' . $search . '%')
        );
        $query->when($filters['category'] ?? false, fn($query, $category)=>
        $query->whereHas('category', fn($query)=>$query->where('slug', $category))
        );
        $query->when($filters['author'] ?? false, fn($query, $author)=>
        $query->whereHas('author', fn($query)=>$query->where('username', $author))
        );
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}