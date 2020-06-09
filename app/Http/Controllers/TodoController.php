<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        $this->middleware('auth');
    }
    
    public function index()
    {
        // $data['todos'] =  Todo::orderBy('completed')->get();
        $data['todos'] = auth()->user()->todos->sortBy('completed');
        return view('todo.index', $data);
    }

    // Create Todo
    public function create()
    {
        return view('todo.createTodo');
    }

    // Store Todo
    public function store(TodoCreateRequest $req)
    {
        
        // !Only authenticated user can insert data 
        // $req['user_id'] = auth()->id();
        // Todo::create($req->all());
        $todo = auth()->user()->todos()->create($req->all());
        if($req->step) {
            foreach ($req->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        return redirect(route('todo.index'))->with('success', 'TO-DO Created Successfully');
    }

    public function show(Todo $todo)
    {
        return view('todo.showTodo', compact('todo'));
    }

    // Edit Todo
    public function edit(Todo $todo)
    {
        $data['todo'] = $todo;
        return view('todo.editTodo', $data);
    }

    // Update Todo
    public function update(TodoCreateRequest $req, Todo $todo)
    {
        dd($req->all());
        $todo->update(['title' => $req->title, 'description' => $req->description]);
        if ($req->step) {
            foreach ($req->step as $step) {
                $step->update(['name' => $step]);
            }
        }
        return redirect()->route('todo.index')->with('success', 'To-Do Updated');
    }

    // Todo Complate
    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('success', 'Task marked as Completed!');
    }

    // Todo Incomplete
    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('success', 'Task marked as Incompleted!');
    }

    // Todo Delete
    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete(); // Delete the relationship (Step reletionship)
        $todo->delete();
        return redirect()->back()->with('success', 'Task Deleted!');
    }
}
