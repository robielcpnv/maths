<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable = ['result','question_id','user_id','correct'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
