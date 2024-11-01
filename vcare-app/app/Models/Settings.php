<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settings extends Model
{
    /** @use HasFactory<\Database\Factories\SettingsFactory> */
    use HasFactory;
    use SoftDeletes;


    protected $table = "settings";

    protected $primaryKey = 'id';


    protected $fillable = [
        'site_name',
        'question_img',
        'question_home',
        'question_answer',
        'footer_title',
        'footer_contact',
        'footer_app_title',
        'footer_app_contact',
        'footer_app_img',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

}
