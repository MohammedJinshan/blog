<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aricle extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->hasOne(Category::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
