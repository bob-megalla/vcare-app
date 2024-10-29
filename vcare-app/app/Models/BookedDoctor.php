<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookedDoctor extends Model
{
    //
    protected $table = "booked_doctor";

    protected $primaryKey = 'id';


    protected $fillable = [
        'name',
        'phone',
        'email',
        'doctor_id',
        'is_compeleted',
        'is_readed',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
