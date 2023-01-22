<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Exercise;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function show(Question $question, Answer $answer)
    {
        $questions = Question::all()->where('exercise_id',$question->exercise_id)->where('cycle',$question->cycle);
        $exercise = Exercise::find($question->exercise_id);
        return response()->json([
            'questions' => $questions,
            'exercise' => $exercise
        ]);
    }
}
