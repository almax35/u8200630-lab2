<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'content', 'dateTimeCreated', 'author'];
    public function tags()
    {
        return $this->belongsToMany(Tag::class); #Many to many
    }
}