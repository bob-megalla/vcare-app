<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    //
    protected $table = "messages";

    protected $primaryKey = 'id';


    protected $fillable = [
        'name',
        'phone',
        'email',
        'subject',
        'message',
        'is_readed',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
