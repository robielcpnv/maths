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
    public function index()
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
        $questions=[];
        for ($i=0; $i < $exercise->quantity; $i++) { 
            Question::create([
                "first" => rand($exercise->firstMin,$exercise->firstMax)*$exercise->firstMultiplier,
                "second" => rand($exercise->secondMin,$exercise->secondMax)*$exercise->secondMultiplier,
                'operation_id' => $exercise->operation->id,
                'exercise_id' => $exercise->id,
                'cycle' => 1
            ]);
       }
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
        $cycle==null?$cycle=1:$cycle++;
        for ($i=0; $i < $exercise->quantity; $i++) { 
            Question::create([
                "first" => rand($exercise->firstMin,$exercise->firstMax)*$exercise->firstMultiplier,
                "second" => rand($exercise->secondMin,$exercise->secondMax)*$exercise->secondMultiplier,
                'operation_id' => $exercise->operation->id,
                'exercise_id' => $exercise->id,
                'cycle' => $cycle
            ]);
       }
       dd(Question::all());
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
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
