<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

  public function index()
  {
    $todos = Todo::all();
    return view('index', ['todos' => $todos]);
  }


  public function store(Request $request)
  {
    $data = $request->validate([

      'title' => 'required|max:250',
      'content' => 'required|max:20000',
      'due_date' =>'nullable|after:today',
      
    ]);

    Todo::create($data);

    return back();
  }


  public function edit(Todo $todo)
  {
    //in the future should be casted from model
    // $todos['completed_at'] = Carbon::parse($todos['completed_at'])->format('Y-m-d');
    return view('edit', ['todo' => $todo]);
  }

  public function destroy(Todo $todo)
  {
    $todo->delete();

    return back()->with("message", "Post has been deleted");
  }

  public function update(Request $request, Todo $todo)
  {
    $data = $request->validate([
      'title' => 'required',
      'content' => 'required',
      'due_date'=>'required',
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
