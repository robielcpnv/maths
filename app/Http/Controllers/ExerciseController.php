<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Exercise;
use App\Models\Operation;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exercises = Exercise::all()->sortByDesc('updated_at');
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
        $this->authorize('create', Exercise::class);
        
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
            'description' => $request->description,
            'firstMin' => $request->firstMin,
            'firstMax' => $request->firstMax,
            'firstMultiplier' => $request->firstMultiplier?$request->firstMultiplier:1,
            'operation_id' => Operation::firstWhere('slug',$request['operation'])->id,
            'quantity' => $request->quantity,
            'secondMin' => $request->secondMin,
            'secondMax' => $request->secondMax,
            'secondMultiplier' => $request->secondMultiplier?$request->secondMultiplier:1,
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
        $questions = Question::all()->where('exercise_id',$exercise->id)->sortByDesc('updated_at')->groupBy('cycle');
        return view('exercises.show',compact('exercise','questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        $operations = Operation::all();
        return view('exercises.edit',compact('exercise','operations'));
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
        $this->authorize('update', $exercise);
        $data = $request->validate([
            'name' => ['required', 'max:255','min:3'],
            'firstMin' => ['required', 'min:0'],
            'firstMax' => ['required', 'min:0'],
            'quantity' => ['required', 'min:0'],
            'secondMin' => ['required', 'min:0'],
            'secondMax' => ['required', 'min:0'],
            'firstMultiplier' => ['required', 'gt:0'],
            'secondMultiplier' => ['required', 'gt:0'],
        ]);
        if($request->description){
            $data['description'] = $request->description;
        }

        $operation = Operation::firstWhere('slug',$request['operation'])->id;
        if($operation !== $exercise->operation_id){
            $data['operation_id'] = $operation;
        }

       $exercise->update($data);
       $exercise->save();
       
       return redirect()->route('exercises.show',$exercise);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        $this->authorize('delete', $exercise);
        $exercise->delete();
        $exercises = Exercise::all()->sortByDesc('updated_at');
        return redirect()->route('exercises.index', compact('exercises'));
    }
}
