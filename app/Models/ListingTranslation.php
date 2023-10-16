<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingTranslation extends Model
{
    use HasFactory;

    protected $table = "listings_translations"; 
    public $timestamps = false;
    protected $fillable = ['title', 'content'];

}
