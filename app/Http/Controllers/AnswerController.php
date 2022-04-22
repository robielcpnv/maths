<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Exercise;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    // index method no need at this moment
    // create method no need because question.show method will be used
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Question $question )
    {
        $exercise = Exercise::find($question->exercise_id);

        $answers = $request->input('answer');
        $request->validate([
            'answers.*' => ['required']
        ]);

        foreach ($answers as $key => $answer) {
            $question = Question::firstWhere('id',$key);
            Answer::create([
                'result' => $answer,
                'question_id' => $key,
                'user_id' => auth()->user()->id,
                'correct' => $question->result == $answer ? 1 : 0
            ]);
        }

        $questions = Question::all()->where('exercise_id',$exercise->id)->sortByDesc('updated_at')->groupBy('cycle');
        return view('exercises.show',compact('exercise','questions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, Answer $answer)
    {
        $questions = Question::all()->where('exercise_id',$question->exercise_id)->where('cycle',$question->cycle);
        $exercise = Exercise::find($question->exercise_id);

        return view('answers.show',compact('questions','exercise'));
    }
    // edit and update method no need if you want you could take new 

    // delete method no need at this moment
}
