<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Question;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::all()->sortByDesc('updated_at');
        return response()->json([
            'exercises' => $exercises
        ]);

    }

    public function show(Exercise $exercise)
    {
        $questions = Question::all()->where('exercise_id',$exercise->id)->sortByDesc('updated_at')->groupBy('cycle');
        return response()->json([
            'questions' => $questions,
            'exercise' => $exercise
        ]);
    }
}
