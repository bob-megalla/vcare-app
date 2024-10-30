<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookedDoctor extends Model
{
    use SoftDeletes;
    //
    protected $table = "booked_doctor";

    protected $primaryKey = 'id';


    protected $fillable = [
        'name',
        'phone',
        'email',
        'doctor_id',
        'user_id',

        'is_compeleted',
        'is_readed',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
