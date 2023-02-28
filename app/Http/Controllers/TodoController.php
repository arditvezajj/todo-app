<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tag;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class TodoController extends Controller
{

  public function index()
  {
    if (request('search')) {
      $search = request('search');
      $todos = Todo::where(function ($query) use ($search) {
        $query->where('title', 'like', "%{$search}%")
          ->orWhere('content', 'like', "%{$search}%");
      })->where('user_id', Auth::user()->id)
        ->paginate(5);
    } else {

      $todos = Todo::orderBy('created_at', 'desc')->with(['tags'])->where('user_id', Auth::user()->id)->paginate(5);
    }

    return view('Todos.index', ['todos' => $todos, 'priorities' => Todo::getPriorities(), 'tags' => Tag::all(), 'projects' => Project::all()]);
  }

  public function create()
  {
    $tags = Tag::all();
    return view('todos.index', [
      'tags' => $tags,
    ]);
  }

  public function store(Request $request)
  {
    $data = $request->validate([

      'title' => 'required|max:250',
      'content' => 'required|max:20000',
      'due_date' => 'nullable|after:today',
      'priority' => 'nullable',
      'tags' => 'nullable',
      'project_id' => 'nullable',
    
    ]);

   

    $todos = ToDo::create([...['user_id' => Auth::user()->id], ...$data]);


    if ($request->has('tags')) {
      foreach ($request->tags as $tag) {

        $todos->tags()->attach(explode(',', $tag));
      }
    }
    return back()->with("message", "Task has been created");
  }

  public function edit(Todo $todo)
  {
   
    $this->authorize('view', $todo);

    $todo = $todo->load(['tags']);
    return view('todos.edit', ['todo' => $todo, 'priorities' => Todo::getPriorities(), 'tags' => Tag::all(), 'tagIds' => $todo->tags->pluck('id')->toArray()]);
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
      'tags' => 'nullable',
    ]);

    $todo->update($data);


    if ($request->has('tags')) {
      $todo->tags()->detach();
      foreach ($request->tags as $tag) {
        $todo->tags()->attach(explode(',', $tag));
      }
    }
    return back()->with("message", "Post has been updated");
  }

  public function completed(Request $request, Todo $todo)
  {
    $todo->update(['completed_at' => now()]);

    return back()->with("message", "Completed Succesfully");
  }
}
