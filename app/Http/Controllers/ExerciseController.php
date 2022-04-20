<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Operation;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::all();
        return view('exercises.index', compact('exercises'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operations = Operation::all();
        return view('exercises.create',compact('operations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => ['required', 'max:255','min:3'],
            'description' => ['nullable', 'max:255'],
            'firstMin' => ['required', 'min:0'],
            'firstMax' => ['required', 'min:0'],
            'operation' => ['required'],
            'quantity' => ['required', 'min:0'],
            'secondMin' => ['required', 'min:0'],
            'secondMax' => ['required', 'min:0'],
        ]);
        
        Exercise::create([
            'name' => $request->name,
            'description' => $request->descrition,
            'firstMin' => $request->firstMin,
            'firstMax' => $request->firstMax,
            'operation_id' => Operation::firstWhere('slug',$request['operation'])->id,
            'quantity' => $request->quantity,
            'secondMin' => $request->secondMin,
            'secondMax' => $request->secondMax,
        ]);

        return redirect()->route('exercises.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        //
    }
}
