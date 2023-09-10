<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cawards extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'issuer',
        'location',
        'award_date',
    ];

}
