<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorsFactory> */
    use HasFactory;

    protected $table = "doctors";

    protected $primaryKey = 'id';


    protected $fillable = [
        'name_doctor',
        'img_doctor',
        'major_id',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function majorDoctors(){
        return $this->belongsTo(Majors::class, 'major_id', 'id');
    }
}
