<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
    protected $guarded = [];
    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters) {


        $query->when($filters['search'] ?? false, fn ($query, $search)=>
        $query
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('excerpt', 'like', '%' . $search . '%')

        );
        $query->when($filters['category'] ?? false, fn ($query, $category)=>
        $query
            ->whereHas('category', fn ($query)=>
            $query->where('name', $category)
            )
        );
        $query->when($filters['user'] ?? false, fn ($query, $user)=>
        $query
            ->whereHas('user', fn ($query)=>
            $query->where('email', $user)
            )
        );
    }

    public function category(): BelongsTo
    {
      return $this->belongsTo(Category::class);
    }
    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
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
