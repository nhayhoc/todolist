<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Validator;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $todo;

    public function __contruct(Todo $todo){
        $this->todo = $todo;
    }

    public function index()
    {
        $todo_uncompleted = Todo::where('completed',0)->get();
        $todo_completed = Todo::where('completed',1)->get();
        return view('todo')->with(['todo_uncompleted'=>$todo_uncompleted,'todo_completed'=>$todo_completed]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'todo'  =>  'required|string|max:255'
        ]);

        if ($validator->fails()) {
            echo 'here';
            return redirect('todo/index')->withErrors($validator)->withInput();
        }
        Todo::create($request->all());
        return redirect('todo/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        foreach ($request->id as $value) {
            $todo = Todo::find($value);
            $todo->completed = 1;
            $todo->save();
        }
        return redirect('todo/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }
}
