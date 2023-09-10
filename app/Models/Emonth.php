<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emonth extends Model
{
    use HasFactory;

    protected $table = 'emonth';

    protected $fillable = [
        'name',
        'department',
        'month',
        'year',
    ];
}
