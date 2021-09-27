<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Date;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos_to_be_done = Todo::where('completed', false)->get(); //list/collection
        $completed_count = Todo::where('completed', true)->count(); //int
        $expired_count = Todo::where('expiration_date', '<', now())->count(); //int

        return view('todos.index', [
            'todos' => $todos_to_be_done, 
            'completed_count' => $completed_count,
            'expired_count' => $expired_count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = Todo::create($request->all());

        // $todo = Todo::create([
        //     'name' => $request->name,
        //     'description' => $request->description,   
        //     'completed' => true
        // ]);

        return view('todos.index')->with('message', 'Todo created successfully');
                                    //a toast message will appear, see layouts.app.blade
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo) //ha itt megadjuk, hogy Todo tipusu: automatikusan lekeri az adatbazisbol
    {

        //adott id-ju todo lekérdezése:
        //$todo = Todo::find($todo);
        //$todo = Todo::where('id', $todo)->get(); //lista (collection)
        //$todo = Todo::where('id', $todo)->get()->first(); //lekerjuk az osszes todot, majd az elso elemet visszaadjuk, nem optimalis
        //$todo = Todo::where('id', $todo)->first(); //csak az elso elemet kerjuk le
        //$todo = Todo::where('id', $todo)->firstOrFail(); //ha nem talalja, akkor hiba


        //query builder: ->get()-nel keri le az adatbazisbol
        //a get kivalthato pl. first-tel

        return view('todos.index', ['todos' => [$todo]]);

    }

    public function markAsDone(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
