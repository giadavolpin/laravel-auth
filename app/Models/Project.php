<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    use MasFactory;
    protected $fillable = ['title', 'slug', 'content'];

    public static function generateSlug($title)
    {
        return Str::slug($title, '-');
    }

}