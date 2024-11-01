<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Messages extends Model
{
    use SoftDeletes;

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
