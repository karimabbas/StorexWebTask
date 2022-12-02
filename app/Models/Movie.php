<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id','title','description','image','rate'
    ];
    protected $appends = [
        'image_url',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopeFilter(Builder $builder, $filters)
    {

        if ($filters['title'] ?? false) {
            $builder->where('movies.title', 'LIKE', "%{$filters['title']}%");
        }
        if ($filters['category_id'] ?? false) {
            $builder->where('movies.category_id', '=', $filters['category_id']);
        }
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {

            return 'https://kubalubra.is/wp-content/uploads/2017/11/default-thumbnail.jpg';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        return $this->image;
    }
}
