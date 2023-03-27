<?php

namespace App\Models;

use App\Models\Lists;
use App\Models\RentLog;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function rentlogs()
    {
        return $this->hasMany(RentLog::class);
    }
    public function lists()
    {
        return $this->hasMany(Lists::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('categories', function ($query) use($category) {
                $query->where('name', 'like', '%' . $category . '%');
            });
        });
    }
}
