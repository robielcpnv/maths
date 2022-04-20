<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $atributes = [
        'quantity' => 5,
        'firstMin' => 0,
        'firstMax' => 10,
        'secondMin' => 0,
        'secondMax' => 10,
        'operator' => '+',
    ];
}
