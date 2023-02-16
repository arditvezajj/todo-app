<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
  public function index()
  {
    
    return view('projects.index', ['projects' => Project::orderBy('created_at','desc')->get()]);
  }


  public function store(Request $request)
  {
    $data = $request->validate([
      'title' => 'required|max:250',
      'content' => 'required|max:20000', 
    ]); 

    $data['user_id']=Auth::user()->id;
    Project::create($data);
    return back()->with("message", "Project has been created");
  }

  public  function destroy(Project $project)
  {
    $project->delete();

    return back()->with("message", "Post has been deleted");
  }
  public function edit(Project $project)
  {

    return view('projects.edit',['project' => $project,]);
  }

}
