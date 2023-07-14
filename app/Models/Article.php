<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory,SoftDeletes;
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
