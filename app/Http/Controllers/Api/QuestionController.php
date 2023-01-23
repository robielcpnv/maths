<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show(Exercise $exercise,Question $question)
    {
        $questions = Question::all()->where('exercise_id',$exercise->id)->where('cycle',$question->cycle);
        return response()->json([
            'questions' => $questions,
            'exercise' => $exercise
        ]);
    }
}
