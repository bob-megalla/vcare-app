<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Majors extends Model
{
    /** @use HasFactory<\Database\Factories\MajorsFactory> */
    use HasFactory;
    protected $table = "major";

    protected $primaryKey = 'id';


    protected $fillable = [
        'name_major',
        'img_major',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    // public function doctorMajors(){
    //     return $this->hasMany(Doctors::class, 'id_major', 'id');
    // }
}
