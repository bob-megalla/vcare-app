<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /** @use HasFactory<\Database\Factories\SettingsFactory> */
    use HasFactory;

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
