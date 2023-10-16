<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Listing extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable = ['author'];


    public $translatedAttributes = ['title', 'description', 'category', 'tags'];

    public function scopeFilter($query, array $filters)
    {

    //     Post::whereTranslationLike('title', '%first%')
    // ->orWhereTranslationLike('title', '%second%')
    // ->get();

        if($filters['tag'] ?? false) {
            $query->whereTranslationLike('tags', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false) {
            $query->whereTranslationLike('title', '%' . request('search') . '%')
            ->orWhereTranslationLike('description', '%' . request('search') . '%')
            ->orWhereTranslationLike('tags', '%' . request('search') . '%');

        }

        if($filters['category'] ?? false) {
            $query->whereTranslationLike('category', '%' . request('category') . '%');
        }
    }


}
