<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function movies() {
        return $this->hasMany(Movie::class, 'category_id','id');
    }

    public function scopeFilter(Builder $builder, $filters)
    {

        if ($filters['category_id'] ?? false) {
            $builder->where('movies.category_id', '=', $filters['category_id']);
        }
        if ($filters['category_id'] == 0 ?? false) {
            $builder->all();
        }
    }

}
