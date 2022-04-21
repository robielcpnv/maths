<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exercise $exercise)
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exercise $exercise)
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Exercise $exercise)
    {
        $cycle = Question::all()->where('exercise_id',$exercise->id)->max('cycle');
        $cycle == null ? $cycle = 1 : $cycle;
        $operator = $exercise->operation;
        $cycle++;
        for ($i=0; $i < $exercise->quantity; $i++) { 
            
            $f = rand($exercise->firstMin,$exercise->firstMax)*$exercise->firstMultiplier;
            $s = rand($exercise->secondMin,$exercise->secondMax)*$exercise->secondMultiplier;

            $result = eval("return $f $operator->name $s;");
            $compare = $f == $s ?'=':($f > $s?'>':'<');

            Question::create([
                'first' => $f,
                'second' => $s,
                'operation_id' => $operator->id,
                'response' => $operator->id <5 ? $result : $compare,
                'exercise_id' => $exercise->id,
                'cycle' => $cycle
            ]);
       }
       return redirect()->route('exercises.show',$exercise);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise,Question $question)
    {
        $questions = Question::all()->where('exercise_id',$exercise->id)->where('cycle',$question->cycle);
        return view('questions.show',compact('questions','exercise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
