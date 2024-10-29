<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;

    protected $table = "news";

    protected $primaryKey = 'id';


    protected $fillable = [
        'img_link',
        'title_news',
        'contact_news',
        'published',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
