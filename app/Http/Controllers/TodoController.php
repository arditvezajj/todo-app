<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

  public function index()
  {
    if (request('search')) {
      $todos = Todo::where('title', 'like', '%' . request('search') . '%')
        ->orWhere('content', 'like', '%' . request('search') . '%')
        ->paginate(5);;
        
    } else {
      $todos = Todo::orderBy('created_at', 'desc')->paginate(5);
    }

    return view('Todos.index', ['todos' => $todos ,'priorities'=>Todo::getPriorities()]);
  }


  public function store(Request $request)
  {
    $data = $request->validate([

      'title' => 'required|max:250',
      'content' => 'required|max:20000',
      'due_date' => 'nullable|after:today',
      'priority' =>'nullable',

    ]);

    Todo::create($data);

    return back();
  }


  public function edit(Todo $todo)
  {
    //in the future should be casted from model
    // $todos['completed_at'] = Carbon::parse($todos['completed_at'])->format('Y-m-d');
    return view('todos.edit', ['todo' => $todo,'priorities'=>Todo::getPriorities()]);
  }

  public  function destroy(Todo $todo)
  {
    $todo->delete();

    return back()->with("message", "Post has been deleted");
  }

  public function update(Request $request, Todo $todo)
  {
    
    $data = $request->validate([
      'title' => 'required',
      'content' => 'required',
      'due_date' => 'required',
      'priority' => 'nullable',
    ]);

    $todo->update($data);
    return back()->with("message", "Post has been updated");
  }

  public function completed(Request $request, Todo $todo)
  {
    $todo->update(['completed_at' => now()]);

    return back()->with("message", "Completed Succesfully");
  }
}
