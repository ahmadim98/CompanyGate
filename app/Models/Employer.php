<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'empID',
        'name',
        'email',
        'phone',
        'ext',
        'position',
        'department',
    ];

    
    public function user()
    {
        //if not working try 'app\Models\Employer'
        return $this->belongsTo(Users::class,'empid','empID');
    }

}
