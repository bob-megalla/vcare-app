<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Majors extends Model
{
    /** @use HasFactory<\Database\Factories\MajorsFactory> */
    use HasFactory;
    use SoftDeletes;

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
